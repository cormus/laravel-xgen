<?php

class FooterController extends BaseController 
{
        public function  render()
        {
            $footerModel =  new FooterModel();
            $data        =  $footerModel->standard();
            return View::make('footer', $data);
        }
}
