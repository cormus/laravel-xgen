<?php

class HeaderController extends BaseController 
{
        public function  renderApp()
        {
            $headerModel =  new HeaderModel();
            $data        =  $headerModel->standard();
            return View::make('adm.header', $data);
        }       
    
        public function  renderAdm()
        {
            $headerModel =  new HeaderModel();
            $data        =  $headerModel->standard();
            return View::make('adm.header', $data);
        }
}
