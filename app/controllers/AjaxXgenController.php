<?php

class AjaxXgenController
    
    public function callMetod($method, $action)
    {
        $ajaxXgenModel = new AjaxXgenModel();
        if(method_exists($ajaxXgenModel, $method))
        {
             if($action)
                 return $ajaxXgenModel->$method($action);
             else
                 return $ajaxXgenModel->$method();
        }
        else
        {
             return array('code' => 0, 'message' => 'Método não encontrado');
        }
    }    
}