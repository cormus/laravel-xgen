<?php

class MenuModel 
{
    public function menu($data)
    {
        $user = Sentry::getUser();
        
        if($user)
        {
            $admin = Sentry::findGroupByName('Admins');
            if($user->inGroup($admin))
            {
                //é administrador
            }
        }
        
        $data['logued'] = false;
        if(Sentry::check())
        {
            $data['logued']      = true;
            $data['email']       = $user->email;
        }
        
        return $data;
    }
}