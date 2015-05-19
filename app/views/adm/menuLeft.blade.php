<ul>
	<?php
		foreach($pages as $page)
		{
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
	?>
					<li>
						<a href="{{ URL::to($com) }}">
							<i class="fa {{ $page->getIco() }}"></i>
							<span class="title">{{ $page->getTitle() }}</span>
						</a>
					</li>
	<?php
				}
			}
		}
	?>
</ul>