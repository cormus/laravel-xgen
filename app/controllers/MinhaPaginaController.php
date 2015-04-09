<?php
class MinhaPaginaController extends BaseController
{
		public function  render()
		{
			$MinhaPaginaModel =  new MinhaPaginaModel();
			$data = $MinhaPaginaModel->render();
			return View::make('app.MinhaPagina', $data);
		}
}
