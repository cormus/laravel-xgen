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
        $name = $this->getName();
        $imgs = array();
        if($row && $row->$name && json_decode($row->$name))
        {
            $imgs = json_decode($row->$name);
        }
        
        $required = '';
        if($this->getRequired())
           $required = '<span class="required">*</span>';
        
        $subTitle = '';
        if($this->getSubTitle())
            $subTitle = '<span class="subtitle">'.$this->getSubTitle().'</span>';
        
        $campHTML  = '';
        $campHTML .= '<div class="form-group group-img">';
                $campHTML .= Form::label($this->getName(), $this->getTitle()).$required.$subTitle.'<br />';
                for($i = 0; $i < 2; $i++)
                {
                    if(isset($imgs[$i]))
                        $background = URL::to('imagem.php?p='.$this->getPath().'/'.$imgs[$i].'&w=150&h=150');
                    else
                        $background = '';
                    $campHTML .= '<div class="img" style="background:url(\''.$background.'\') 100% 100%">';
                        $campHTML .= Form::file($this->getName().'[]', array('class' => '', 'id' => $this->getName()));
                    $campHTML .= '</div>';
                }
        $campHTML .= '</div>';
        return $campHTML;
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
        //verifica se existe envio de arquivos
        if (Input::hasFile($this->getName()) && $file[0])
        {
            //verifica se o diretório existe, se não existir tenta criar
            if(is_dir($this->path) || mkdir($this->path, 0755))
            {
                //Chama o arquivo com a classe WideImage
                require_once(__DIR__.'/../../../wideimage/WideImage.php');

                $name = array();
                //pega a imagem enviada
                $img = WideImage::load($this->getName());
                //verifica se as imagens foram carregadas
                if(is_array($img))
                {
                    //percore cada imagen
                    foreach($img as $value)
                    {
                        //cria um nome único para a imagem
                        $imgName = md5(time().rand()).'.jpg';
                        //salva as imagens no diretório
                        $value->saveToFile($this->path.'/'.$imgName);
                        //guarda os nomes para cadastrar no banco de dados
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
        $name = $this->getName();
        //verifica se o campo é obrigatório e foi preenchido
        //
        //verifica se exist image salva
        $row = $this->getRow();
        if($row)
        {
            if($row->$name && json_decode($row->$name))
            {
                $imgs = json_decode($row->$name);
                return !empty($imgs);
            }
        }
        
        //verifica se existe imagem sendo enviada
        $value = $this->loadValue();
        $imgs = array_shift($value);
        return !empty($imgs);
    }
}
