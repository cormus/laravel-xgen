<?php

class MenuModel 
{
    public function menu($data)
    {
        $user = Sentry::getUser();
        if($user)
        {
            $admin = Sentry::findGroupByName('Admins');
            //super admin não tem pagamento
            if(!$user->inGroup($admin))
            {


            }
        }
        
        $data['logued'] = false;
        if(Sentry::check())
        {
            $data['logued']      = true;
            $data['email']       = $user->email;
            $data['profileLink'] = '<li><a href="'.$user->profile_name.'">Perfil</a></li>';
        }
        
        return $data;
    }
}

?>
