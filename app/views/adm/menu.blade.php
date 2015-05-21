<!-- NAVBAR ================================================== -->
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="width-100-l">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ $projectName }}</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <?php
                                foreach ($pages as $page)
                                {
                                    //mostar no menu
                                    //mostrar no menu se estiver logado
                                    if($page->getShowInMenu())
                                    {
                                        if($page->getShowInMenuIfLogged())
                                        {
                                            $logged = Sentry::check();
                                        }
                                        else
                                        {
                                            $logged = true;
                                        }

                                        if($logged)
                                        {
                                            //quando a rota é setada com parametros é necessário retirar os mesmos
                                            $end = strpos($page->getRout(), '/');
                                            if ($end)
                                                $com = substr($page->getRout(), 0, $end);
                                            else
                                                $com = $page->getRout();
                                            $current = (Request::is($com) || Request::is($com . '/*')) ? 'class="active"' : '';
                                            echo '<li ' . $current . '><a href="' . URL::to($com) . '">' . $page->getTitle() . '</a></li>';
                                        }
                                    }
                                }
							?>
                                <!--
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                -->
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-r">
                    @if($logued)
                        <li><a href="#">{{ $email }}</a></li>
                        <li><a href="{{ URL::to('login/logout') }}">Sair</a></li>
                    @else
                        <li><a href="{{ URL::to('login') }}">Login</a></li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>