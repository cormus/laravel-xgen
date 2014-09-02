$(function(){
    $('input[name=password]').on('keyup',function(e){
         if(e.which == 13)
            sendLogin();
    });
});

function sendLogin()
{
    var email = $('input[name=email]');
    var password = $('input[name=password]');
    
    if(
        email.val() &&
        password.val()
    )
    {
        if($.validateEmail(email.val()))
            $('form[name=form-login]').submit();
        else
            modal('Informe um email válido');
    }
    else 
        modal('Informe os campos corretamente !');
    
}

function sendNewPassword()
{
    var password = $('input[name=password]');
    var confirmPassword = $('input[name=confirm-password]');
    
    if(
        !password.val() ||
        !confirmPassword.val()
    )
    {
        modal('Informe os campos corretamente !');
    }
    else if (password.val() != confirmPassword.val())
    {
        modal('As senhas não coincidem !');
    }
    else
    {
        $('form[name=form-password-recovery]').submit();
    }
}

function sendUnsubscribe()
{
    var email = $('input[name=email]');
    
    if(email.val())
    {
        if($.validateEmail(email.val()))
            $('form[name=form-unsubscribe]').submit();
        else
            modal('Informe um email válido');
    }
    else 
        modal('Informe os campos corretamente !');
}

function openModalFeedback()
{
    var html = '<div id="modal-feedback"><h1>Feedback</h1><h2>Dê sua opinião. Como podemos melhorar o S.Mail® ?</h2><div class="text-feedback"><textarea name="feedback"></textarea></div><div class="btns-default btns-color-a" onclick="sendFeedback()"><p>Enviar</p><span class="sprites"></span></div></div>';
    $.fancybox(html);
}

function sendFeedback()
{
    if($('textarea[name=feedback]').val())
    {
        var ajax = new Ajax({
            link:'modal/feedback',
            callback:function(data)
            {
                var obj = jQuery.parseJSON(data);
                if(obj.message == 'success')
                {
                   var html = '<div id="modal-feedback"><h1>Informação enviada.</h1><h2>Em breve entraremos em contato.</h2></div>';
                   $.fancybox(html);
                }
                else
                {
                     var html = '<div id="modal-feedback"><h1>Erro !</h1><h2>Erro ao tentar enviar sua mensagem !</h2></div>';
                    $.fancybox(html);
                }
            }
        });

        ajax.setDado('feedback', $('textarea[name=feedback]').val());
        ajax.enviar();
    }
    else
    {
        modal('Escreva sua mensagem !');
    }
}



function openModalHelp()
{
    var html = '<div id="modal-feedback"><h1>Ajuda?</h1><h2>Informe-nos a sua dúvida. Ajudaremos você.</h2><div class="text-feedback"><textarea name="help" placeholder="Deixei sua mensagem..."></textarea></div><div class="btns-default btns-color-a" onclick="sendHelp()"><p>Enviar</p><span class="sprites"></span></div></div>';
    $.fancybox(html);
}

function sendHelp()
{
    if($('textarea[name=help]').val())
    {
        var ajax = new Ajax({
            link:'modal/help',
            callback:function(data)
            {
                var obj = jQuery.parseJSON(data);
                if(obj.message == 'success')
                {
                   var html = '<div id="modal-feedback"><h1>Informação enviada.</h1><h2>Em breve entraremos em contato.</h2></div>';
                   $.fancybox(html);
                }
                else
                {
                     var html = '<div id="modal-feedback"><h1>Erro !</h1><h2>Erro ao tentar enviar sua mensagem !</h2></div>';
                    $.fancybox(html);
                }
            }
        });

        ajax.setDado('help', $('textarea[name=help]').val());
        ajax.enviar();
    }
    else
    {
        modal('Escreva sua mensagem !');
    }
}

function modal(text, buttonText, modalContentId, jsButtonAction, extraHtml)
{
    if (typeof buttonText === "undefined")
        buttonText = 'OK';
    
    if (typeof modalContentId === "undefined")
        modalContentId = 'modal-feedback';
    
    if (typeof extraHtml === "undefined")
        extraHtml = '';
    
    if (typeof jsButtonAction === "undefined")
        jsButtonAction = '$.fancybox.close()';
    
    var html = '<div id="'+modalContentId+'" class="modal-message"><h2>'+text+'</h2>'+extraHtml+'<h2><div class="btns-default btns-color-a" onclick="'+jsButtonAction+'"><p>'+buttonText+'</p><span class="sprites"></span></div></h2></div>';
    $.fancybox(html);
}

function modalQuestion(text, jsTextConfirmAction)
{
    var html = '<div id="modal-question" class="modal-message"><h2>'+text+'</h2><div class="button-space"><div class="btns-default btns-color-a" onclick="'+jsTextConfirmAction+'"><p>Sim</p><span class="sprites"></span></div></div><div class="button-space"><div class="btns-default btns-color-b" onclick="$.fancybox.close()"><p>Não</p><span class="sprites"></span></div></div></div>';
    $.fancybox(html, {autoResize: false});
}

function modalPasswordRecovery()
{
    inputHtml = '<h2><input id="passwordRecoveryEmail" type="text" name="recoveryEmail" /></h2>';
    modal('Insira o e-mail informado em seu cadastro:', 'Recuperar minha senha!', 'modal-password-recovery', 'recoverPasswordTo($(\'#passwordRecoveryEmail\').val())', inputHtml);
}

function recoverPasswordTo(email)
{
    if (typeof email === "undefined" || email == '')
        $.fancybox('<div id="modal-feedback" class="modal-message"><br /><h2>Informe um e-mail válido !</h2></div>');
    else {
        var ajax = new Ajax({
            link : 'auth/recoverPassword',
            callback : function(data)
            {
                var obj = jQuery.parseJSON(data);
                var html = '<div id="modal-feedback" class="modal-message"><h2>'+obj.message+'</h2></div>';
                $.fancybox(html);
            }
        });

        ajax.setDado('email', email);
        ajax.enviar();
    }
}