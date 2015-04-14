<?php
class MenuController extends BaseController 
{
        public function  render($data)
        {
            $menuModel =  new MenuModel();
            return View::make('adm.menu', $menuModel->menu($data));
        } 
	
		public function  menuLeft($data)
        {
            $menuModel =  new MenuModel();
            return View::make('adm.menuLeft', $menuModel->menu($data));
        }
}