<?php

class HeaderController extends BaseController 
{
        public function  render()
        {
            $headerModel =  new HeaderModel();
            $data        =  $headerModel->standard();
            return View::make('header', $data);
        }
}
