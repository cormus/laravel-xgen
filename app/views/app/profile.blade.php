<div class="modal fade profile-modal-item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="profile-modal-imagem">
            <img src="http://www.cormus.com.br/colecao/public/imagem.php?p=data/game/95fc1708cd849f9e3aa518355fc265b8.jpg&w=500" id="item-modal-image">
        </div><!--/profile-modal-imagem-->
        <div class="profile-modal-data">
            <h1 id="item-modal-name"></h1>
            <h2>
                <span id="item-modal-console"></span>
                &nbsp;-&nbsp;
                <span id="item-modal-game"></span>
            </h2>
            <h3 id="item-modal-description"></h3>
            <div class="pull-left width-100">
                <h3>Curtiram (<span id="item-modal-likes-count"></span>) <span id="item-modal-likes-users"></span></h3>
                <h3>Comentários (<span id="item-modal-comment-count"></span>)</h3>
                <ul id="item-modal-comments" class="pull-left width-100"></ul>
                <textarea class="form-control comment-camp" id="comment" placeholder="" name="comment"></textarea>
                <button type="button" class="btn btn-primary comment-btn" onclick="app.itemComment()">Enviar</button>
            </div>
        </div><!--/profile-modal-imagem-->
    </div>
  </div>
</div>

<div class="container marketing page-line">
    <div id="profile-top" class="pull-left width-100">
        <div class="pull-left width-100">
            <img src="{{ URL::to("imagem.php?p=data/top/{$img_top}&w=1165&cropw=1165&croph=400") }}" class="width-100" />
        </div><!--/profile-top-->
        <div class="profile-data pull-left width-100">
            <div class="profile-image pull-left">
                <img src="{{ URL::to("imagem.php?p=data/user/{$img_user}&w=110&cropw=110&croph=110") }}"/>
                <button type="button" class="btn {{ ($follower)?'btn-success':'btn-primary' }} pull-left width-100" onclick="app.followerUser({{ $id_user }});">
                    {{ ($follower)?'Seguindo':'Seguir' }}
                </button>
            </div><!--/profile-top-->
            <div class="profile-name pull-left">
                <h1>{{ $name }}</h1>
            </div><!--/profile-top-->
            <div class="profile-values pull-right row">
                <div class="col-md-4">
                    <h1>Ítens</h1>
                    <p>{{ $itens_number }}</p>
                </div>
                <div class="col-md-4">
                    <h1>Seguindo</h1>
                    <p>{{ $follower_number }}</p>
                </div>
                <div class="col-md-4">
                    <h1>Seguidores</h1>
                    <p>{{ $following_number }}</p>
                </div>
            </div>
        </div><!--/data-top-->
    </div><!--/profile-top-->
    <div id="profile-itens">
        @for($i = 0; $i < count($itens); $i += 4)
        <ul class="pull-left width-100">
            @for($e = $i; $e < $i + 4 && isset($itens[$e]); $e++)
                <li onclick="app.modalItem({{ $itens[$e]->id }})">
                    <h1>{{ $itens[$e]->title }}</h1>
                    <div class="profile-box-img">
                        <img src="http://www.cormus.com.br/colecao/public/imagem.php?p={{ $itens[$e]->img }}&amp;w=300&amp;h=300">
                        @if(in_array(1, $itens[$e]->disponivel) || in_array(2, $itens[$e]->disponivel))
                            <div class="item-line-commerce pull-left width-100">
                                @if(in_array(1, $itens[$e]->disponivel))
                                    Avenda
                                @endif
                                @if(in_array(2, $itens[$e]->disponivel))
                                    Troca
                                @endif
                                <span class="item-value pull-right"><b>R$ {{ $itens[$e]->current_value }}</b></span>
                            </div>
                        @endif
                    </div><!--/profile-box-img-->
                    <div class="item-values pull-left width-100">
                        <p><span>Curtiram</span> {{ $itens[$e]->likes_number }}</p>
                        <p><span>Comentários</span> {{ $itens[$e]->comments_number }}</p>
                    </div>
                </li>
            @endfor
        </ul>
        @endfor
    </div><!--/profile-itens-->
</div>