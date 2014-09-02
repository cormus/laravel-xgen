<?php

class ProfileModel 
{
    public function profile()
    {
        $return = array();
        
        $param = explode('/', str_replace(str_replace('index.php', '', $_SERVER['PHP_SELF']), '', $_SERVER['REDIRECT_URL']));
        
        if($param)
        {
            $row = DB::table('users')->where('profile_name', $param[0])->first();
            if($row)
            {
                $return['id_user']     = $row->id;
                $return['name']        = $row->name;

                //verifica se foi cadastrada uma imagem para o topo
                if($row->img_top && json_decode($row->img_top))
                {
                    $imgs = json_decode($row->img_top);
                    if(!empty($imgs))
                        $return['img_top'] = $imgs[0];
                }

                //verifica se foi cadastrada uma imagem para o perfil
                if($row->img_user && json_decode($row->img_user))
                {
                    $imgs = json_decode($row->img_user);
                    if(!empty($imgs))
                        $return['img_user'] = $imgs[0];
                }

                //pega a id do usuário que esta logado
                $user = Sentry::getUser();
                //verifica se o usuário logado segue esse cara
                //null é para quando o usuário onão esta logado
                $return['follower'] = null;
                if($user)
                {
                    $rows = DB::table('cormus_followers')->where('id_follower', '=', $user->id)->where('id_following', '=', $row->id)->select('id')->get();
                    //não esta seguindo ou esta
                    if(empty($rows))
                        $return['follower'] = false;
                    else
                        $return['follower'] = true;
                }

                //pega a quantidade de seguidores
                $return['following_number'] = DB::table('cormus_followers')->where('id_following', $row->id)->count();
                //pega a quantidade que esta seguindo
                $return['follower_number']  = DB::table('cormus_followers')->where('id_follower', $row->id)->count();
                //pega a quantidade que ele esta seguindo
                $return['games_number']     = DB::table('cormus_games_user')->where('id_user', $row->id)->count();
                //quantidade de itens
                $return['itens_number']     = $return['games_number'];


                $itens = DB::table('cormus_itens')
                            ->select('id', 'id_games', 'title', 'disponivel', 'current_value', 'img_link as img')
                            ->where('id_user', '=', $row->id)
                            ->orderBy('id', 'desc')
                            ->get();
                for($i = 0; $i < count($itens); $i++)
                {
                    //faz o tratamento da imagem
                    $item = $itens[$i];

                    $item->disponivel = json_decode($item->disponivel);

                    $item->comments_number =  DB::table('cormus_comments')->select('id')->where('id_item', '=', $item->id)->count();
                    $item->likes_number    =  DB::table('cormus_likes')->select('id')->where('id_item', '=', $item->id)->count();


                    //verifica se foi cadastrada uma imagem para o perfil
                    if($item->img && json_decode($item->img))
                    {
                        $imgs = json_decode($item->img);
                        if(!empty($imgs))
                        {
                            if($item->id_games)
                                $item->img = 'data/games_user/'.$imgs[0];
                            else
                                $item->img = 'data/consoles_user/'.$imgs[0];
                        }
                    }
                    $itens[$i] = $item;
                }
                $return['itens'] = $itens;
            }
            else
            {
                header("Location:".URL::to('404'));
                exit();
            }
            
        }
        return $return;
    }
}
