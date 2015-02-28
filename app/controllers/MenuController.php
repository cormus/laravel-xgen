<?php
class MenuController extends BaseController 
{
        public function  render($data)
        {
            $menuModel =  new MenuModel();
            return View::make('menu', $menuModel->menu($data));
        }
}