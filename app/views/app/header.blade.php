	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('ico/favicon.ico') }}">

    <title>Administrador</title>

   <link href="{{ asset('bawer/font-awesome-4.4.0/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bawer/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- <link href="{{ asset('bootstrap/css/carousel.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/xgen.flash.css') }}" rel="stylesheet">
    <!--css do app-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adm.css') }}" rel="stylesheet">
    
    <!-- js padrões -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.maskMoney.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('bawer/tinymce_4.1.9/tinymce.min.js') }}"></script>
    <script src="{{ asset('bawer/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bawer/bootstrap/js/docs.min.js') }}"></script>
    <!--códigos do fancybox-->
    <script src="{{ asset('bawer/fancybox/source/jquery.fancybox.js?v=2.1.5') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('bawer/fancybox/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
    <!--js do Xgen-->
    <script src="{{ asset('js/xgen.js') }}"></script>
    <!--js do app-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
		var baseURL = '{{ URL::to('/') }}';
		var baseRequest = '{{ Request::url() }}';
	</script>
   <style>
       body,
       html
       {
           padding:0px;
           width:100%;
           height:100%;
           float:left;
       }
       .main
       {
           background: #F1F3FA;
       }
       .sidebar
       {
           display:none;
           padding: 0px;
           background-color: #465460;
       } 
           .sidebar ul
           {
               list-style:none;
               padding:0px;
           }
           .sidebar ul li a
           {
                 min-height: 78px;
                  display: block;
                  position: relative;
                  margin: 0;
                  border: 0px;
                  padding: 17px 15px 15px 15px;
                  text-decoration: none;
                  text-align: center;
                  border-top: 1px solid #536372;
                  color: #f2f4f6;
           }
           .sidebar ul li i
           {
                font-size: 24px;
                text-shadow: none;
                font-weight: 300;
                text-align: center;
                color: #7ba0bb;      
           }
           .sidebar ul li .title
           {
                color: #f2f4f6;
                width: 100%;
                float: left;
                font-size: 13px;
                font-weight: 300;
           }
       @media (min-width: 768px)
       {
           .sidebar
           {
             position: fixed;
              top: 51px;
              bottom: 0;
              left: 0;
              z-index: 1000;
              display: block;
              overflow-x: hidden;
              overflow-y: auto;
           }
       }
       
       .page-title
       {
            border-bottom: 1px solid #ddd;
           font-family: "Open Sans", sans-serif;
       }
       
       .btn
       {
          -webkit-border-radius: 0 !important;
          -moz-border-radius: 0 !important;
          border-radius: 0 !important;
       }
       
       .page-title .btn 
        {
          margin-top: 27px;
        }
       
       .btn-success
       {
           background-color: #0096A9;
           border-color: #3ea49d;
       }
       .btn-danger 
       {
          background-color: #F3565D;
          border-color: #f13e46;
       }
   </style>