 
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