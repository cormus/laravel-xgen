<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author Alex
 */
class Image extends Field{
    
    var $path;
    
    public function setPath($data)
    {
        $this->path = $data;
    }
    public function getPath()
    {
        return $this->path;
    }
    public function loadValue()
    {
        //se existir um submit no formulário retorna o valor do forulário
        return Input::file($this->getName(), $this->getValue());
    }


    public function tableData($table)
    {
        $table->text($this->getName());
        return $table;
    }
    
    public function render($row)
    {
        $required = '';
        if($this->getRequired())
           $required = '<span class="required">*</span>';
        return '<div class="form-group">
                    '.Form::label($this->getName(), $this->getTitle())
                     .$required
                     .Form::file($this->getName().'[]', array('class' => 'form-control', 'id' => $this->getName())).'
                </div>';
    }
    
    public function treatmentValue($row)
    {
        $name = $this->getName();
        if($row->$name)
        {
            $images = json_decode($row->$name);
            if(!empty($images))
            {
                return '<img src="'.URL::to("imagem.php?p={$this->path}/{$images[0]}&w=150&h=150").'"/>';
            }
        }
    }
    
    /**
     * Método que é executado na hora que acontece um envio de imagem
     * 
     */
    public function run()
    {
        $file = $this->loadValue();
        if (Input::hasFile($this->getName()) && $file[0])
        {
            if(is_dir($this->path) || mkdir($this->path, 0755))
            {
                //Chama o arquivo com a classe WideImage
                require_once(__DIR__.'/../../../wideimage/WideImage.php');

                $name = array();
                //pega a imagem enviada
                $img = WideImage::load($this->getName());
                if(is_array($img))
                {
                    foreach($img as $value)
                    {
                        //cria um nome único para a imagem
                        $imgName = md5(time().rand()).'.jpg';
                        $value->saveToFile($this->path.'/'.$imgName);
                        $name[] = $imgName;
                    }
                }
                else
                {
                    $imgName = md5(time().rand()).'.jpg';
                    $img->saveToFile($this->path.'/'.$imgName);
                    $name[] = $imgName;
                }
                
                //add as imagens a class
                $this->setValue($name);

                return json_encode($name);
            }
        }
        return false;
    }
    
    public function delet($rows)
    {
        $name = $this->getName();
        foreach($rows as $row)
        {
            if($row->$name)
            {
                $imgs = json_decode($row->$name);
                foreach($imgs as $img)
                {
                    if(file_exists($this->getPath().'/'.$img))
                    {
                        unlink($this->getPath().'/'.$img);
                    }
                }
            }
        }
    }
    
    /**
     * funçao que verifica se o campo foi preenchido
     * retorna true se for válido
     * 
     * @param type $value
     * @return boolean
     */
    public function requiredFieldIsValid()
    {
        //verifica se o campo é obrigatório e foi preenchido
        //
        //verifica se exist image salva
        $row = $this->getRow();
        if($row)
        {
            if($row->img_link && json_decode($row->img_link))
            {
                $imgs = json_decode($row->img_link);
                return !empty($imgs);
            }
        }
        
        //verifica se existe imagem sendo enviada
        $value = $this->loadValue();
        $imgs = array_shift($value);
        return !empty($imgs);
    }
}
