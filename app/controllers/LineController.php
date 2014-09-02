<?php

class LineController extends BaseController 
{
        public function  render()
        {
            $lineModel =  new LineModel();
            $data         =  $lineModel->profile();
            return View::make('app.line', $data);
        }
}
