 
 /**
  * Função para validação de email
  * 
  * Ex:: $.validateEmail('fulano@email.com.br');
  * 
  */
 $.validateEmail = function (email)
{
	er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	if(er.exec(email))
		return true;
	else
		return false;
};


/**
 * Função para só permitir números nos inputs dos forms
 * 
 * Ex:
 *            <input maxlength="9" onkeydown="javascript:return numeros(event); " onkeypress="formatar(this, '#####-###'); " name="cep">
 */
function numeros(event){
   var tecla = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;

   if ((tecla >= 48 && tecla <= 57) || (tecla >= 96 && tecla <= 105) || tecla == 8 ||  tecla == 9){
       return  true;
   }else{
       return  false;
   }
}

/**
 * Função para mascara de entrada de dados
 * 
 * 
 * Ex;
 *            <input maxlength="9" onkeydown="javascript:return numeros(event); " onkeypress="formatar(this, '#####-###'); "  name="cep">
 */
function formatar(src, mask) {
	   var i = src.value.length;
	   var saida = mask.substring(0,1);
	   var texto = mask.substring(i)
	   if (texto.substring(0,1) != saida) {
	      src.value += texto.substring(0,1);
	   }
}

/**
 *  Função para limpar campo de texto
 *  
 *   Ex::  <input type="text" onfocus="limpaCampo(this)" onblur="originalCampo(this, 'Seu nome')" value="Seu Nome" name="nomePratoDia">
 */
function limpaCampo(object)
{
	$(object).val('');
}

/**
 * Função para colocar texto em um campo se ele for fazio
 * 
 *   Ex::  <input type="text" onfocus="limpaCampo(this)" onblur="originalCampo(this, 'Seu nome')" value="Seu Nome" name="nomePratoDia">
 */
 function originalCampo(object, value)
 {
	
	 if(!$(object).val())
	{
		 $(object).val(value);
	}
 }
 
 
 function ocultarCampos(obj, valor, className)
 {
 	if($(obj).val() == valor)
 	{
 		$('.'+className).hide();
 	}
 	else
 	{
 		$('.'+className).show();
 	}
 }
 
  
 function mostrarCampos(obj, valor, className)
 {
 	if($(obj).val() == valor)
 	{
 		$('.'+className).show();
 	}
 	else
 	{
 		$('.'+className).hide();
 	}
 }
 
 
function tinyMCE()
{
	 tinymce.init({
		selector: ".tinyMCE",
		theme: "modern",
		width: 680,
		height: 300,
		link_list: [
			{title: 'My page 1', value: 'http://www.tinymce.com'},
			{title: 'My page 2', value: 'http://www.tecrail.com'}
		],
		plugins: [
			 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
			 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
			 "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
	   ],
		relative_urls: false,
		browser_spellcheck : true ,
		filemanager_title:"Responsive Filemanager",
		external_filemanager_path:"bawer/tinymce_4.1.9/plugins/filemanager/",
		external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"},
	  
	   image_advtab: true,
	   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
	   toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview code  | forecolor backcolor"
	 });
}
 


$(function(){
    var mask = $('.mask');
    $.each(mask, function(i, obj){
        $(obj).mask($(obj).attr('mask')); 
    });

    $(".maskMoney").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

    $('.onchange').change(function(){

        field = $(this).attr('relationship');
        camp  = $(this).attr('camp');

        $('select[name='+field+']').html('<option value="0">Carregando...</option>');

        $.post( 
            baseURL+'/ajax/relationship', 
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
        location.href = baseRequest+'?'+filterUrl();
    });

    $('#btn-search').click( function (){
        if($('input[name=search]').val())
        {
            url = 'search='+$('input[name=search]').val();
            if(filterUrl())
                url += '&'+filterUrl();
            location.href = baseRequest+url;
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


function replaceAll(string, token, newtoken) {
	while (string.indexOf(token) != -1) {
 		string = string.replace(token, newtoken);
	}
	return string;
}



function Table()
{
    var obj = {};
    
    obj.write = function(table, data, callback)
    {
         $.post( 
            baseURL+'/ajax/table/write?table='+table, 
            data, 
            callback,
            'json'
        );
    }
    obj.read = function(table, callback)
    {
        $.post( 
            baseURL+'/ajax/table/read?table='+table, 
            {}, 
            callback,
            'json'
        );
    }
    obj.delete = function(table, id, callback)
    {
        $.post( 
            baseURL+'/ajax/table/delete?table='+table, 
            {
                id:id
            }, 
            callback,
            'json'
        );
    }
    obj.update = function(table, id, data, callback)
    {
         $.post( 
            baseURL+'/ajax/table/update?table='+table+'&id='+id, 
            data, 
            callback,
            'json'
        );
    }
}