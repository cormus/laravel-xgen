
angular.module('xgen', [])
.controller('XgenController', ['$scope' , '$http', function($scope, $http){
	
	$scope.pageForm = 0;
	
	$scope.openIcones = function()
	{
		html = '<section id="medical">\n\
				  <h2 class="page-header">Medical Icons</h2>\n\
				  <div class="row fontawesome-icon-list">\n\
					  <div class="fa-hover col-md-3 col-sm-4"><a data-ng-click="setIcone(\'fa fa-ambulance\')"><i class="fa fa-ambulance"></i> ambulance</a></div>\n\
					  <div class="fa-hover col-md-3 col-sm-4"><a data-ng-click="setIcone(\'fa fa-h-square\')"><i class="fa fa-h-square"></i> h-square</a></div>\n\
				  </div>\n\
				</section>';
				
		$.fancybox(html);
		
		/*
		$http.get('/font-awesome-4.4.0/icones.html').success(function(data, status, headers, config) {
			$.fancybox(data);
		});
		*/
	}
	
	$scope.setIcone = function(icone)
	{
		$scope.page.icone = icone;
	}
	
   /*############ - Funções de página - ##############*/
	
	//inicia o id da página atual
	$scope.id_page = null;
	
	//inicia a lista de páginas
	$scope.pages = [];
	
	//inicia uma nova página
	function __initPage()
	{
		$scope.page = {
			title:'',
			rout:'',
			controller:false,
			module:false,
			view:false,
			loginRequired:true,
			showInMenuIfLogged:true,
			showInMenu:true,
			form:null
		};
	}
	
	$scope.preencherRota = function()
	{
		$scope.page.rout = criarUrl($scope.page.title);
	};
	
	$scope.verificarRota = function()
	{
		$scope.page.rout = criarUrl($scope.page.rout);
	};
	
	$scope.cancelCreatePage = function()
	{
		//fecha a página de formulário
		$scope.pageForm = 0;
		//cancela a inserção da página
		$scope.pages.splice($scope.id_page, 1);
	};
	
	function retirarAcentos(palavra) 
	{ 
		com_acento = 'áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ'; 
		sem_acento = 'aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC'; 
		nova=''; 
		for(i=0;i<palavra.length;i++) { 
			if (com_acento.search(palavra.substr(i,1))>=0) { 
				nova+=sem_acento.substr(com_acento.search(palavra.substr(i,1)),1); 
			} 
			else { 
				nova+=palavra.substr(i,1); 
			} 
		} 
		return nova; 
	};
	
	function criarUrl(value)
	{
		return retirarAcentos(value).toLowerCase().replace(/[^a-z0-9]+/g,'-');
	};
	
	$scope.newPage = function()
	{
		__initPage();
		//abre a página de formulário
		$scope.pageForm = 1;
		//seta o id da página como a última
		$scope.id_page = $scope.pages.length;
		//inicia uma nova página
		$scope.pages.push($scope.page);
	}
	
	$scope.editPage = function(id_page)
	{
		$scope.pageForm = 1;
		$scope.id_page  = id_page;
		$scope.page     = $scope.pages[$scope.id_page];
		$scope.form     = $scope.pages[$scope.id_page].form;
	}
	
	$scope.deletPage = function(id_page)
	{
		for(var i in $scope.pages)
		{
			if(i == id_page)
			{
				 $scope.pages.splice(i, 1);
			}
		}
		//inicia o id da página atual
		$scope.id_page = null;
		//limpa os dados do formulário
		__initPage();
	}
	
	$scope.savePage = function()
	{
		if(!$scope.page.title)
		{
			alert('Informe o título da novo página');
			return false;
		}
		
		if(!$scope.page.rout)
		{
			alert('Informe o rota da nova página');
			return false;
		}
		
		for(var i in $scope.pages)
		{
			if($scope.pages[i].rout == $scope.page.rout && $scope.id_page != i)
			{
				alert('Já existe um página com essa rota escolha outra.');
				return false;
			}
		}
		//fecha o formulário de página
		$scope.pageForm = 0;
		//guarda a página atual na lista de páginas
		$scope.pages[$scope.id_page] = $scope.page;
		//inicia o id da página atual
		$scope.id_page = null;
		//limpa os dados do formulário
		__initPage();
	}
	
	
/*############### - /Funções de página - ##################*/

/*############### - Funções de formulário - ###############*/

	function __initForm()
	{
		$scope.form = {
			table:'xgen_',
			title:'',
			subTitle:'',
			showBtnNewCadastre:true,
			showBtnEdit:true,
			showBtnDelete:true,
			showSelectBox:true,
			fields:[]
		};
	}
	
	$scope.openModalForm = function()
	{
		$scope.pageForm = 2;
	}
	
	$scope.cancelForm = function()
	{
		//fecha a tela de formulário
		$scope.pageForm = 1;
	}
	
	$scope.newForm = function()
	{
		__initForm();
		$scope.pageForm = 2;
	}
	
	$scope.deletForm = function()
	{
		//remove o formulário da página atual
		$scope.pages[$scope.id_page].form = null;
		//fecha o modal de formulário
		$scope.pageForm = 1;
		//limpa os dados do formulário
		__initForm();
	}
	
	$scope.editForm = function()
	{
		$scope.form   = $scope.pages[$scope.id_page].form;
		$scope.fields = $scope.form.fields;
		$scope.openModalForm();
	}
	
	$scope.saveForm = function()
	{
		if(!$scope.form.table)
		{
			alert('Informe o nome da tabela do novo formulário');
			return false;
		}
		
		if(!$scope.form.title)
		{
			alert('Informe o título do novo formulário');
			return false;
		}
		
		for(var i in $scope.pages)
		{
			//verifica se já existe um field diferente do atual cadastrado com esse name
			if($scope.pages[i].form && $scope.pages[i].form.table == $scope.form.table && i != $scope.id_page)
			{
				//caso exista informa para escolher outro nome
				alert('Já existe um formulário cadastrado com esse nome de tabela, escolha outro nome.');
				return false;
			}
		}
		
		//atualiza o formulário da página atual
		$scope.pages[$scope.id_page].form = $scope.form;
		//fecha o modal de formulário
		$scope.pageForm = 1;
		//limpa os dados do formulário
		__initForm();
	}
	
/*############### - /Funções de formulário - #################*/
	

/*################ - Funções de field - ################*/

	//inicia o id do field atual
	$scope.id_field = null;
	
	//inicia a listagem de fields
	$scope.fields = [];
	
	//inicialização dos campos do formulário
	$scope.fieldc = {
		select:{
			preencher:0,
			table:'',
			option:'id',
			column:''
		},
		checkbox:{
			preencher:0,
			table:'',
			option:'id',
			column:''
		},
		radiobutton:{
			preencher:0,
			table:'',
			option:'id',
			column:''
		},
		cep:{
			bairro:'',
			logradouro:'',
			uf:'',
			localidade:'',
			cep:'',
		},
		image:{
			path:''
		}
	};
	
	//inicia as configurações do field
	function __initField()
	{
		$scope.fieldc = {
			title:'',
			name:'',
			type:'',
			required:false,
			showform:true,
			showlist:true,
			filter:false
		};
	}
	
	$scope.preencherFieldName = function()
	{
		$scope.fieldc.name = criarFieldName($scope.fieldc.title);
	};
	
	$scope.verificarFieldName = function()
	{
		$scope.fieldc.name = criarFieldName($scope.fieldc.name);
	};
	
	function criarFieldName(value)
	{
		return retirarAcentos(value).toLowerCase().replace(/[^a-z0-9]+/g,'_');
	};
	
	$scope.openModalField = function()
	{
		$scope.pageForm = ($scope.pageForm == 3)? 2: 3;
	}
	
	$scope.newField = function()
	{
		//inicia os dados do field em branco
		__initField();
		//limpa o id do field
		$scope.id_field = null;
		//abre o modal de configurção de field
		$scope.pageForm = 3;
	}
	
	$scope.deletField = function(fieldName)
	{
		for(var i in $scope.fields)
		{
			if($scope.fields[i].name == fieldName)
			{
				 $scope.fields.splice(i, 1);
			}
		}
	}
	
	$scope.editField = function(id_field)
	{
		$scope.id_field = id_field;
		$scope.fieldc   = $scope.pages[$scope.id_page].form.fields[$scope.id_field];
		$scope.pageForm = 3;
	}
	
	$scope.saveField = function()
	{
		if(!$scope.fieldc.title)
		{
			alert('Informe o título do novo field');
			return false;
		}
		
		if(!$scope.fieldc.name)
		{
			alert('Informe o nome do novo field');
			return false;
		}
		
		for(var i in $scope.fields)
		{
			//verifica se já existe um field diferente do atual cadastrado com esse name
			if($scope.fields[i].name == $scope.fieldc.name && i != $scope.id_field)
			{
				//caso exista informa para escolher outro nome
				alert('Já existe um fild com esse nome, escolha outro nome.');
				return false;
			}
		}
		
		if(!$scope.fieldc.type)
		{
			alert('Informe o tipo do novo field');
			return false;
		}
		
		var newField = {
			title:$scope.fieldc.title,
			name:$scope.fieldc.name,
			type:$scope.fieldc.type
		};
		
		switch($scope.fieldc.type) 
		{
			
			case 'text':
			break;
			case 'textarea':
			break;
			case 'editor':
			break;
			case 'select':
				newVield.table  = $scope.fieldc.select.table  = '';
				newVield.option = $scope.fieldc.select.option = '';
				newVield.column = $scope.fieldc.select.column = '';
			break;
			case 'checkbox':
				newVield.table  = $scope.fieldc.checkbox.table  = '';
				newVield.option = $scope.fieldc.checkbox.option = '';
				newVield.column = $scope.fieldc.checkbox.column = '';
			break;
			case 'radiobutton':
				newVield.table  = $scope.fieldc.radiobutton.table  = '';
				newVield.option = $scope.fieldc.radiobutton.option = '';
				newVield.column = $scope.fieldc.radiobutton.column = '';
			break;
			case 'date':
			break;
			case 'cep':
				newVield.bairro      = $scope.fieldc.cep.bairro     = '';
				newVield.logradouro  = $scope.fieldc.cep.logradouro = '';
				newVield.uf          = $scope.fieldc.cep.uf         = '';
				newVield.localidade  = $scope.fieldc.cep.localidade = '';
				newVield.cep         = $scope.fieldc.cep.cep        = '';
			break;
			case 'int':
			break;
			case 'line':
			break;
			case 'monetary':
			break;
			case 'password':
			break;
			case 'imagebox':
			break;
			case 'image':
			break;
			default:
				
		} 
		
		//verifica se é para editar um mfield já existente
		if($scope.id_field != null)
		{
			$scope.pages[$scope.id_page].form.fields[$scope.id_field] = newField;
		}
		else
		{
			//coloca o novo field na lista de fields
			$scope.pages[$scope.id_page].form.fields.push(newField);
		}
		
		//atualiza a lista na página
		$scope.fields = $scope.pages[$scope.id_page].form.fields;
		//reinicia o id do field
		$scope.id_field;
		//limpa os dados do field
		__initField();
		//fecha o modal de field
		$scope.pageForm = 2;
	}
/*############ - /Funções de field - ##############*/
}]);


/*

function Inputs()
{
	var inputs = this;
	inputs.inputSelect = function(title, name, options)
	{
		var html = '';
		html += '<div class="form-group">';
			html += '<label for="'+name+'">'+title+'</label>';
			html += '<select name="" class="form-control" name="'+name+'" id="'+name+'">';
				for(var i in options)
				{
					html += '<option value="'+options[i].value+'">'+options[i].option+'</option>';
				}
			html += '</select>';
	    html += '</div>';
		return  html;
	}
	
	inputs.inputText = function(title, name, value)
	{
		var html = '';
		html += '<div class="form-group">';
			html += '<label for="'+name+'">'+title+'</label>';
			html += '<input type="text" class="form-control" name="'+name+'" id="'+name+'"" value="'+value+'">';
		html += '</div>';
		return  html;
	}
	
	inputs.inputCheckbox = function(title, name, options)
	{
		var html = '';
		html += '<div class="form-group">';
		html += '<h4>'+title+'</h4>';
		for(var i in options)
		{
			html += '<div class="checkbox">';
				html += '<label>';
					html += '<input type="checkbox" value="'+options[i].value+'" name="'+name+'"> '+options[i].option;
				html += '</label>';
			html += '</div>';
		}
		html += '</div>';
		return  html;
	}
	
	inputs.inputRadio = function(title, name, options)
	{
		var html = '';
		html += '<div class="form-group">';
		html += '<h4>'+title+'</h4>';
		for(var i in options)
		{
			html += '<div class="radio">';
				html += '<label>';
					html += '<input type="radio" value="'+options[i].value+'" name="'+name+'"> '+options[i].option;
				html += '</label>';
			html += '</div>';
		}
		html += '</div>';
		return  html;
	}
}


$(function(){
	var inputs = new Inputs();
	
	var html = '';
	html += inputs.inputText('Título', 'title', 'c');
	html += inputs.inputText('Rota', 'rota', 'c');
	html += inputs.inputCheckbox('Criar o controle', 'controle', [{value:1, option:'Sim'}]);
	html += inputs.inputCheckbox('Criar o módulo', 'modulo', [{value:1, option:'Sim'}]);
	html += inputs.inputCheckbox('Criar a view', 'view', [{value:1, option:'Sim'}]);
	//$.fancybox(html);
	$('#pagina').html(html);
	
	var html = '';
	html += inputs.inputText('Nome da tabela', 'tabela', 'xgen_');
	html += inputs.inputText('Título', 'title', 'c');
	html += inputs.inputText('Subtítulo', 'subtitle', 'c');
	html += inputs.inputCheckbox('Mostrar botão Novo Cadastro', 'view', [{value:1, option:'Sim'}]);
	html += inputs.inputCheckbox('Mostrar botão De editar linha', 'view', [{value:1, option:'Sim'}]);
	html += inputs.inputCheckbox('Mostrar botão Deletar Cadastro', 'view', [{value:1, option:'Sim'}]);
	html += inputs.inputCheckbox('Mostrar box de seleção de linhas', [{value:1, option:'Sim'}]);
	//$.fancybox(html);
	$('#form-dados').html(html);
});
*/