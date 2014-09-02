<?php
/**
 * base para os fields
 *
 * @author Alex
 */
abstract class Field
{
    var $row = null;
    var $name;
    var $title;
    var $size = 250;
    var $value = null;
    var $showList = true;
    var $required = false;
    
    abstract public function render($row);
    
    /**
     * Tipos de campos da tabela
     * 
     * todos os campos suportados pelo laravel são encontrados no link
     * http://laravel.com/docs/schema
     */
    abstract public function tableData($table);
    
    public function setRow($data)
    {
        $this->row = $data;
    }
    public function getRow()
    {
        return $this->row;
    }
    
    public function setName($data)
    {
        $this->name = $data;
    }
    public function getName()
    {
        return $this->name;
    }
    
    public function setTitle($data)
    {
        $this->title = $data;
    }
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setSize($data)
    {
        $this->size = $data;
    }
    public function getSize()
    {
        return $this->size;
    }
    
    public function setValue($data)
    {
        $this->value = $data;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function loadValue()
    {
        //se existir um submit no formulário retorna o valor do forulário
        return Input::get($this->getName(), $this->getValue());
    }
    
    public function setShowList($data)
    {
        $this->showList = $data;
    }
    public function getShowList()
    {
        return $this->showList;
    }
    
    public function setRequired($data)
    {
        $this->required = $data;
    }
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Faz o tratamento dos dados para serem mostrados na listagem
     * 
     * @param object $row
     * @return string
     */
    public function treatmentValue($row)
    {
        $name = $this->getName();
        return $row->$name;
    }
    
    /**
     * funçao que verifica se o campo foi preenchido
     * 
     * @param type $value
     * @return boolean
     */
    public function requiredFieldIsValid()
    {
        //verifica se o campo é obrigatório e foi preenchido
        $value = $this->loadValue();
        return !empty($value);
    }
}
