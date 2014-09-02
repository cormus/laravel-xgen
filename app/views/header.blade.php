<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('ico/favicon.ico') }}">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('bootstrap/css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--css do app-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="{{ asset('assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.maskMoney.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/docs.min.js') }}"></script>
    <!--js do app-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            var mask = $('.mask');
            $.each(mask, function(i, obj){
                $(obj).mask($(obj).attr('mask')); 
            });
            
            $(".money").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
            
            $('.onchange').change(function(){
                
                field = $(this).attr('relationship');
                camp  = $(this).attr('camp');
                
                $('select[name='+field+']').html('<option value="0">Carregando...</option>');
                
                $.post( 
                    '{{ URL::to("ajax/relationship") }}', 
                    {
                      id:$(this).val(),
                      id_camp:$(this).attr('id_camp'),
                      table:$(this).attr('table'),
                      camp:camp
                    }, 
                    function(data) 
                    {
                        option = '<option value="0">Selecione uma opção</option>';
                        $.each(data,function(i, o){
                            option += '<option value="'+o.id+'">'+o[camp]+'</option>';
                        });
                        $('select[name='+field+']').html(option);
                    },
                    'json'
                );
            });
             
            //funçao para ativar os filtros do sistema de listagem
            $('.form-filter').change(function(){
                location.href = '{{ Request::url() }}?'+filterUrl();
            });
            
            $('#btn-search').click( function (){
                if($('input[name=search]').val())
                {
                    url = 'search='+$('input[name=search]').val();
                    if(filterUrl())
                        url += '&'+filterUrl();
                    location.href = '{{ Request::url() }}?'+url;
                }
                else
                {
                    alert('Informe um valor !');
                }
            });
            
            function filterUrl()
            {
                var link = '';
                $('.form-filter').each(function(i, o){
                    if($(o).val() != 0)
                        link += $(o).attr('name')+'='+$(o).val()+'&';
                });
                link = link.substring(0, link.length - 1);
                return link;
            }
            
            
            
            $(document).ajaxStart(function(){
                
            });       
            
            $(document).submit(function(){
                
            });

        });
    </script>