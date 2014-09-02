<?php

class BaseController extends Controller {

        var $param = array();
    
        public function setParam(Array $data)
        {
            $this->param = $data;
        }
        
        public function getParam()
        {
            return $this->param;
        }
        
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}