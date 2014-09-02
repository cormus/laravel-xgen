<?php

class LineModel 
{
    public function profile()
    {
        $return = array();
        
        $user = Sentry::getUser();
        if($user)
        {
            //pega os usuários que eu estou seguindo
            $id_followings = array();
            $followers = DB::table('cormus_followers')->select('id_following')->where('id_follower', '=', $user->id)->get();
            foreach ($followers as $follower)
            {
                $id_followings[] = $follower->id_following;
            }
            //pega as atividades dos usuários que eu estou seguindo
            $itens = DB::table('cormus_itens')
                        ->join('users', 'cormus_itens.id_user', '=', 'users.id')
                        ->select(
                                'cormus_itens.id', 
                                'cormus_itens.id_user', 
                                'cormus_itens.id_games', 
                                'cormus_itens.id_consoles', 
                                'cormus_itens.title', 
                                'cormus_itens.current_value', 
                                'cormus_itens.disponivel', 
                                'cormus_itens.description', 
                                'cormus_itens.img_link AS img',
                                'users.name',
                                'users.profile_name',
                                'users.img_user AS user_img'
                        )
                        ->whereIn('id_user', $id_followings)
                        ->orderBy('id', 'desc')
                        ->get();

            for($i = 0; $i < count($itens); $i++)
            {
                $user_img = json_decode($itens[$i]->user_img);
                $itens[$i]->user_img = 'data/user/'.$user_img[0];


                $itens[$i]->disponivel = json_decode($itens[$i]->disponivel);

                $game = '';
                if($itens[$i]->id_games)
                {
                    $game = DB::table('cormus_games')->select('name')->where('id', '=', $itens[$i]->id_games)->first();
                    $game = $game->name;
                }
                $itens[$i]->game = $game;

                $console = '';
                if($itens[$i]->id_consoles)
                {
                    $game    = DB::table('cormus_consoles')->select('name')->where('id', '=', $itens[$i]->id_consoles)->first();
                    $console = $game->name;
                }
                $itens[$i]->console = $console;

                //pega a quantidade de seguidores
                $itens[$i]->following_number      = DB::table('cormus_followers')->where('id_following', $itens[$i]->id_user)->count();
                //pega a quantidade que esta seguindo
                $itens[$i]->follower_number       = DB::table('cormus_followers')->where('id_follower', $itens[$i]->id_user)->count();
                //pega a quantidade que ele esta seguindo
                $itens[$i]->itens_number          = DB::table('cormus_itens')->where('id_user', $itens[$i]->id_user)->count();
                //pega a quantidade de itens que estão a venda
                $itens[$i]->itens_sale_number     = DB::table('cormus_itens')->where('disponivel', 'LIKE', "%1%")->count();
                $itens[$i]->itens_exchange_number = DB::table('cormus_itens')->where('disponivel', 'LIKE', "%2%")->count();

                //realiza o tratamento dos comentários
                $comments_count =  DB::table('cormus_comments')
                                    ->where('id_item', '=', $itens[$i]->id)
                                    ->orderBy('id', 'desc')
                                    ->count();
                $commentsList =  DB::table('cormus_comments')
                                    ->join('users', 'cormus_comments.id_user', '=', 'users.id')
                                    ->select('cormus_comments.id', 'cormus_comments.comment', 'users.name', 'users.img_user AS img', 'users.profile_name')
                                    ->where('cormus_comments.id_item', '=', $itens[$i]->id)
                                    ->orderBy('cormus_comments.id', 'desc')
                                    ->take(5)
                                    ->get();
                for($e = 0; $e < count($commentsList); $e++)
                {
                    $imgs = json_decode($commentsList[$e]->img);
                    $commentsList[$e]->img = 'data/user/'.$imgs[0];
                }
                $itens[$i]->comment = (object) array('count' => $comments_count, 'list' => $commentsList);

                $likes_count = DB::table('cormus_likes')
                                ->where('id_item', '=', $itens[$i]->id)
                                ->count();
                $likesList = DB::table('cormus_likes')
                                ->select('users.id', 'users.name', 'users.profile_name')
                                ->join('users', 'cormus_likes.id_user', '=', 'users.id')
                                ->where('cormus_likes.id_item', '=', $itens[$i]->id)
                                ->orderBy('cormus_likes.id', 'desc')
                                ->take(5)
                                ->get();
                $itens[$i]->like = (object) array('count' => $likes_count, 'list' => $likesList);

                if($itens[$i]->id_games)
                    $directory = 'data/games_user/';
                else    
                    $directory = 'data/consoles_user/';

                $itens[$i]->img = (object) array('directory' => $directory, 'list' => json_decode($itens[$i]->img));
            }

            $return['itens'] = $itens;
        }
        return $return;
    }
}
