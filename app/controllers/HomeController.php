<?php

class HomeController extends BaseController 
{
        public function  render()
        {
            $homeModel =  new HomeModel();
            $data        =  $homeModel->home();
            return View::make('home.home', $data);
        }
}
