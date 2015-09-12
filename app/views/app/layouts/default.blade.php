<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" >
  <head>
      @if(isset($header))
        {{ $header }}
      @endif
  </head>
  <body>
        @if(isset($menu))
            {{ $menu }}
        @endif
        <div class="container-fluid  height-100">
            <div style="margin-top: 50px;" class="row height-100">
                <div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main  height-100">
                    @if(isset($center))
                        {{ $center }}
                    @endif
                </div>
            </div>
        </div>
  </body>
</html>
