<?php

use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\WrongPasswordException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Throttling\UserBannedException;
 
class AuthController extends BaseController {

    
        public function render($param)
        {
            /*
            //cria um usuário
            $user = Sentry::createUser(array(
                'email'     => 'teste@teste.com',
                'password'  => 'teste',
                'activated' => true,
            ));
            $adminGroup = Sentry::findGroupById(1);
            $user->addGroup($adminGroup);
            /**/
            
            $action = array_shift($param);
            //quando é para realizar logout
            if($action == 'logout')
            {
                $this->logout();
            }
            else if($action == 'recover')
            {
                return $this->recoverPassword();
            }
            //quando é para relizar login
            return  $this->login();
        }
	
	public function login()
	{
                $message    = '';
				$rememberMe = false;
                
                if(Input::get('remember_me'))
                    $rememberMe = true;
                
                $userEmail    = Input::get('email');
                $userPassword = Input::get('password');
                
                if(Input::has('email'))
                {
                    try
                    {
                        $user = Sentry::authenticate(
                                array(
                                        'login'    => $userEmail,
                                        'password' => $userPassword
                                ),
                                $rememberMe
                        );
                        
                        $message = true;
                    }
                    catch (LoginRequiredException $e)
                    {
                        $message = Lang::get('messages.LoginError_LoginFieldRequired');
                    }
                    catch (PasswordRequiredException $e)
                    {
                        $message = Lang::get('messages.LoginError_PasswordFieldRequired');
                    }
                    catch (WrongPasswordException $e)
                    {
                        $message = Lang::get('messages.LoginError_WrongPassword');
                    }
                    catch (UserNotFoundException $e)
                    {
                        $message = Lang::get('messages.LoginError_UserNotFound');
                    }
                    catch (UserNotActivatedException $e)
                    {
                        $message = Lang::get('messages.LoginError_UserIsNotActivated');
                    }
                    // The following is only required if throttle is enabled
                    catch (UserSuspendedException $e)
                    {
                        $message = Lang::get('messages.LoginError_UserIsSuspended');
                    }
                    catch (UserBannedException $e)
                    {
                        $message = Lang::get('messages.LoginError_UserIsBanned');
                    }
                }
                
                //se o login foi realizado
                if($message === true)
                {
                    header('Location: '.URL::to('/'));
                    exit();
                }
                
                return View::make('adm.login.login', array('message' => $message, 'email' => $userEmail, 'password' => $userPassword, 'remember_me' => $rememberMe));
	}

	
	public function logout()
	{
            Sentry::logout();
            header('Location: '.URL::to('/'));
            exit();
	}
	
	public function checkAuth()
	{
            if (!Sentry::check())
            {
                header('Location: '.URL::to('/login/'));
                exit();
            }
	}
        
        public function recoverPassword()
        {
            $message = '';
            $email   = '';
            if(Input::has('email'))
            {
                $email   = Input::get('email');
                if (empty($email))
                {
                    $message = 'Informe um usuário válido!';
                }
                else
                {
                    try
                    {
                        // O usuário:
                        $user = Sentry::findUserByLogin($email);
                        
                        // Gera um password reset code:
                        $resetCode = $user->getResetPasswordCode();

                        $name = $user->name;

                        Mail::send('emails.auth.reminder', array('token' => $resetCode), function($message) use ($name, $email)
                        {
                            $message->from(Config::get('mail.username'));
                            $message->to($email, $name)->subject('Recuperação de senha');
                        });

                        $message = 'Uma mensagem foi enviada para seu e-mail com informações para redefinição de senha.';
                    }
                    catch (UserNotFoundException $e)
                    {
                        $message = 'O usuário não foi encontrado.';
                    }
                }
            }
            return View::make('adm.login.recover', array('message' => $message, 'email' => $email));
        }
        
        public function passwordReset($token)
        {
            $headerController = new  HeaderController();
            $FooterController = new  FooterController();
            $message = '';
            
            try
            {
                $user = Sentry::findUserByResetPasswordCode($token);
                
                if (Input::get('password') && Input::get('confirm-password')) {
                    if (Input::get('password') != Input::get('confirm-password'))
                        $message = 'As senhas informadas não coincidem.';
                    else {
                        // Tenta resetar a senha do usuário:
                        if ($user->attemptResetPassword($token, Input::get('password')))
                        {
                            //$throttle = Sentry::findThrottlerByUserId($user->id);
                             //$throttle->unsuspend();
                            return AuthController::login($user->email);
                        }
                        else
                        {
                            $message = "Ocorreu um erro ao alterar a sua senha. Tente novamente mais tarde.";
                        }
                    }
                }
                return View::make(
                    'adm.layouts.recover',
                    array(
                        'header' => $headerController->header(),
                        'footer' => $FooterController->footer(),
                        'token' => $token,
                        'message' => $message
                    )
                );
                
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return View::make(
                    'adm.layouts.login',
                    array(
                        'header' => $headerController->header(),
                        'footer' => $FooterController->footer(),
                        'message' => 'O link de recuperação é inválido, tente novamente.'
                    )
                );
            }
        }
        
        
        
        
}