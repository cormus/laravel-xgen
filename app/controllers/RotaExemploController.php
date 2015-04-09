<?php
class RotaExemploController extends BaseController
{
		public function  render()
		{
			$RotaExemploModel =  new RotaExemploModel();
			$data = $RotaExemploModel->render();
			return View::make('RotaExemplo', $data);
		}
}
