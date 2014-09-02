<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * ,
 * Description of App
 *
 * @author Alex
 */
class XApp {
    
    var $title;
    var $pages = array();
    var $defullModules = array();
    var $menuStructure = array();
    
    public function setTitle($data)
    {
        $this->title = $data;
    }
    public function getTitle()
    {
        return $this->title;
    }
   
    public function getPages()
    {
        return $this->pages;
    }
    
    public function addPage($page)
    {
        $this->pages[] = $page;
    }
    
    public function addDefullModules(Array $data)
    {
        $this->defullModules = $data;
    }
    
    /**
     * Seta a estrutura de menu e sub-menus
     * 
     * @param array $data
     */
    public function setMenuStructure(Array $data)
    {
        $this->menuStructure = $data;
    }
    public function getMenuStructure()
    {
        return $this->menuStructure;
    }

    public function run() 
    {
        foreach($this->getPages() as $page)
        {
            //coloca os módulos comuns a todas as páginas página
            if(!empty($this->defullModules))
                $page->addModules($this->defullModules);
            
            //verifica se é necessário estar logado para ter acesso a a essa página
            if($page->getLoginRequired())
            {
                Route::any($page->getRout(), array('before' => 'auth', function() use ($page){
                    //se for passado algum parametro na url ele é passado como parametro para a página
                    $page->setParam(func_get_args());
                    return $page->render();
                }));
            }
            else
            {
                //página inicial do site caso esteja logado
                Route::any($page->getRout(), function() use ($page){
                    //se for passado algum parametro na url ele é passado como parametro para a página
                    $page->setParam(func_get_args());
                    return $page->render();
                });
            }

        }
    }
    
    /**
     * Método que organiza as páginas em estrutura de menu e submenus
     * 
     * @return array
     */
    public function menuStructure()
    {
        $pages = $this->getPages();
        $structure = $this->getMenuStructure();

        $return = array();
        foreach($structure as $value)
        {
            if(is_array($value))
            {
                $routes = array();
                foreach($value['routes'] as $rota)
                {
                    foreach($pages as $page)
                    {
                        if($rota == $page->getRout())
                        {
                            //mostar no menu
                            //mostrar no menu se estiver logado
                            if($page->getShowInMenu())
                            {
                                if($page->getShowInMenuIfLogged())
                                {
                                    $logged = Sentry::check();
                                }
                                else
                                {
                                    $logged = true;
                                }

                                if($logged)
                                {
                                    $routes[$page->getRout()] = $page;
                                }
                            }
                        }
                    }
                }
                $value['routes'] = $routes;
                $return[] = $value;
            }
            else
            {
                foreach($pages as $page)
                {
                    if($value == $page->getRout())
                    {
                        //mostar no menu
                        //mostrar no menu se estiver logado
                        if($page->getShowInMenu())
                        {
                            if($page->getShowInMenuIfLogged())
                            {
                                $logged = Sentry::check();
                            }
                            else
                            {
                                $logged = true;
                            }

                            if($logged)
                            {
                                $routes[$page->getRout()] = $page;
                            }
                        }
                        $return[] = $value;
                    }
                }
            }
        }

        return $return;
    }
}