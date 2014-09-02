<!DOCTYPE html>
<html lang="en-US">
<head>
        <meta charset="utf-8">        
</head>
<body>
<table style="width: 100%; background: #FFF;" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td align="center" style="border-bottom: 5px solid #d9d9d9; background-color: #ebebeb; padding: 0 0 88px 0;">
                <table width="600" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td align="center">
                                
                                <p style="color: #989898; font-size: 36px; font-family: OpenSans-Regular, Arial; margin: 88px 0 0 0;">
                                    Recupera&ccedil;&atilde;o de senha
                                </p>
                                <br />
                                <p style="color: #3d474c; font-size: 12px; font-family: OpenSans-Regular, Arial; margin: 0 0 20px 0;">
                                    Para redefinir sua senha, clique no bot&atilde;o abaixo:
                                </p>
                                <br />
                                <p style="color: #989898; display: block; margin: 34px 0 103px 0; font-size: 24px; font-family: OpenSans-Regular, Arial;">
                                    <a href="{{ URL::to('auth/passwordReset', array($token)) }}" style="font-size: 24px; font-family: OpenSans-Regular, Arial; background-color: #1DCBD1; padding: 32px 104px; color: #EBEBEB; font: 24px 'OpenSans-Bold, Arial'; border-radius: 15px; text-decoration: none;">
                                        <span style="color: #EBEBEB; font-size: 24px; font-family: OpenSans-Regular, Arial;">
                                            Redefinir Senha
                                        </span>
                                    </a>
                                </p>
                                <p style="color: #a1a1a1; font-size: 13px; font-family: OpenSans-Regular, Arial;">
                                    Caso n&atilde;o esteja visualizando o bot&atilde;o, clique no link abaixo:<br />
                                    <a style="color: #1DCBD1; text-decoration: none;" href="{{ URL::to('auth/passwordReset', array($token)) }}">
                                        <span style="color: #1DCBD1; font-weight: bold">
                                            {{ URL::to('auth/passwordReset', array($token)) }}
                                        </span>
                                    </a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
    
</body>
</html>