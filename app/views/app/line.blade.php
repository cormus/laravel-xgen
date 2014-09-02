<div class="container marketing">
    <div id="line-itens">
        @foreach($itens as $item)
            <div class="row page-line">
                <div class="col-sm-4">
                    <div class="line-user-profile pull-left width-100">
                        <img class="pull-left" src="http://www.cormus.com.br/colecao/public/imagem.php?p={{ $item->user_img }}&w=50&cropw=50&croph=50"/>
                        <h1  class="pull-left">{{ $item->name }}</h1>
                    </div>
                    <div class="line-user-values width-100 row">
                        <div class="col-md-3">
                            <h1>Ítens</h1>
                            <p>{{ $item->itens_number }}</p>
                        </div>
                        <div class="col-md-3">
                            <h1>venda / troca</h1>
                            <p>{{ $item->itens_sale_number.' / '.$item->itens_exchange_number }}</p>
                        </div>
                        <div class="col-md-3">
                            <h1>Seguindo</h1>
                            <p>{{ $item->following_number }}</p>
                        </div>
                        <div class="col-md-3">
                            <h1>Seguidores</h1>
                            <p>{{ $item->follower_number }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h1 class="pull-left width-100 line-item-title">
                        {{ $item->title }}
                    </h1>
                    <h2 class="pull-left width-100 line-item-subtitle">
                        <span class="item-line-console">{{ $item->console }}</span>
                        @if($item->game)
                            {{'&nbsp;-&nbsp;'}} 
                        @endif
                        <span class="item-line-game">{{ $item->game }}</span>
                    </h2>
                    <img class="pull-left width-100" src="http://www.cormus.com.br/colecao/public/imagem.php?p={{ $item->img->directory.$item->img->list[0] }}&w=620">
                    @if(in_array(1, $item->disponivel) || in_array(2, $item->disponivel))
                        <div class="item-line-commerce pull-left width-100">
                            @if(in_array(1, $item->disponivel))
                                Avenda
                            @endif
                            @if(in_array(2, $item->disponivel))
                                Troca
                            @endif
                            <span class="item-value pull-right"><b>R$ {{ $item->current_value }}</b></span>
                        </div>
                    @endif
                    <div class="item-values pull-left width-100">
                        <h3 id="item-line-description" class=" pull-left width-100">
                            {{ $item->description }}
                        </h3>
                        <div class="pull-left width-100">
                            <div class="line-like-box">
                                <h3>
                                    Curtiram (<span id="item-line-likes-count">{{ $item->like->count }}</span>) 
                                    <span id="item-line-likes-users">
                                        @foreach($item->like->list as $like)
                                            <a href="{{ $like->profile_name }}">{{ $like->name }}</a>
                                        @endforeach
                                    </span>
                                </h3>
                            </div><!--/line-like-box-->
                            <div class="line-comment-box" id="comment-box">
                                <h3>Comentários (<span id="item-line-comment-count">{{ $item->comment->count }}</span>)</h3>
                                <ul id="item-line-comments-{{ $item->id }}" class="pull-left width-100">
                                    @foreach(array_reverse($item->comment->list) as $comment)
                                        <li><span><a href="{{ $comment->profile_name }}"><img src="http://www.cormus.com.br/colecao/public/imagem.php?p={{ $comment->img }}&amp;w=32&amp;cropw=32&amp;croph=32"></a> <b><a href="{{ $comment->profile_name }}">{{ $comment->name }}</a>:</b></span> {{ $comment->comment }}</li>
                                    @endforeach
                                </ul>
                                <textarea class="form-control"    id="comment" placeholder="" name="comment-{{ $item->id }}"></textarea>
                                <button   class="btn btn-primary" type="button" onclick="app.itemCommentLine({{ $item->id }})">Enviar</button>
                            </div><!--/line-comment-box-->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!--/profile-itens-->
</div>