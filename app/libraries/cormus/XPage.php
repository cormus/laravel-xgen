<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Description of XPage
 *
 * @author Alex
 */
class XPage {

    var $rout;
    var $title;
    var $modules = array();
    var $param = array();
    var $loginRequired = false;
    var $showInMenu = true;
    var $showInMenuIfLogged = false;

    public function setParam($data)
    {
        $this->param = $data;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function setRout($data)
    {

        $this->rout = $data;
    }

    public function getRout()
    {

        return $this->rout;
    }

    public function setTitle($data)
    {

        $this->title = $data;
    }

    public function getTitle()
    {

        return $this->title;
    }

    public function setLoginRequired($data)
    {

        $this->loginRequired = $data;
    }

    public function getLoginRequired()
    {

        return $this->loginRequired;
    }

    public function setShowInMenu($data)
    {

        $this->showInMenu = $data;
    }

    public function getShowInMenu()
    {

        return $this->showInMenu;
    }

    public function setShowInMenuIfLogged($data)
    {

        $this->showInMenuIfLogged = $data;
    }

    public function getShowInMenuIfLogged()
    {

        return $this->showInMenuIfLogged;
    }

    public function addModules(Array $modules)
    {

        foreach ($modules as $position => $module)
        {

            $this->modules[$position][] = $module;
        }
    }

    public function addModule($position, $module)
    {

        $this->modules[$position][] = $module;
    }

    public function render()
    {

        //coloca os módulos na estrutura do site

        $positions = array();

        //percorre todas as posições

        foreach ($this->modules as $position => $modules)
        {
            //percorre todos os módulos da posição
            foreach ($modules as $module)
            {
                if (!isset($positions[$position]))
                    $positions[$position] = '';

                $reflectionClass = new ReflectionMethod(get_class($module), 'render');
                $numParam = $reflectionClass->getNumberOfRequiredParameters();

                if($numParam)
                {
                    $positions[$position] .= $module->render($this->getParam());
                }
                else
                {
                    $positions[$position] .= $module->render();
                }
            }
        }
        return View::make('layouts.default', $positions);
    }
}

