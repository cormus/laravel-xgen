<?php

class AjaxXgenModel
{
  
    /*-----------Metodos de CRUD----------*/
    public function table($action)
    {
        $this->$action();
    }
    public function write()
    {
        $table = Input::get('table');
        $data  = Input::get('data');
        return DB::table($table)->insertGetId($data);
    }
    public function read()
    {
       $table = Input::get('table');
       return DB::table($table)->get();
    }
    public function delete()
    {
       $table = Input::get('table');
       $id    = Input::get('id');
       return DB::table($table)->where('id', $id)->delete();
    }
    public function update()
    {
        $table = Input::get('table');
        $data  = Input::get('data');
        return DB::table($table)->update($data);
    }
    /*-----------/Metodos de CRUD----------*/
    
    public function relationship()
    {
        $id      = Input::get('id');
        $id_camp = Input::get('id_camp');
        $table   = Input::get('table');
        $camp    = Input::get('camp');
        return DB::table($table)->where($id_camp, '=', $id)->select('id', $camp)->get();
    }

    
   public function relationship()
    {
        $id      = Input::get('id');
        $id_camp = Input::get('id_camp');
        $table   = Input::get('table');
        $camp    = Input::get('camp');
        return DB::table($table)->where($id_camp, '=', $id)->select('id', $camp)->get();
    }
    
    public function cep()
    {
        $cep = Input::get('cep');
        $ch  = curl_init();
        $timeout = 5; // set to zero for no timeout
        curl_setopt ($ch, CURLOPT_URL, 'http://cep.correiocontrol.com.br/'.$cep.'.json');
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        // display file
        echo $file_contents;
    }
}