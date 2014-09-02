<?php

class UserTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('users')->delete();
		
		$adminsGroup = Sentry::getGroupProvider()->findByName('Admins');
		$usersGroup  = Sentry::getGroupProvider()->findByName('Users');
		
		
		// Usuário de administração:
		$user = Sentry::getUserProvider()->create(array(
			'login'    => 'stoledo',
			'email'    => 'stoledo',
			'password' => 'stol',
			'activated' => 1,
		));
		
		$user->addGroup($adminsGroup);
		
		$throttle = Sentry::getThrottleProvider()->findByUserId($user->id);
		$throttle->unsuspend();
		
		
		// Usuário administrador de Saulo:
		$user = Sentry::getUserProvider()->create(array(
			'email'    => 'saulo@stoledo.com.br',
			'password' => 'stol',
			'activated' => 1,
		));
		
		$user->addGroup($adminsGroup);
		
		$throttle = Sentry::getThrottleProvider()->findByUserId($user->id);
		$throttle->unsuspend();
		
		
		// Usuário de testes de Saulo:
		$user = Sentry::getUserProvider()->create(array(
			'email'    => 'saulo.stoledo@gmail.com',
			'password' => 'stol',
			'activated' => 1,
		));
		
		$user->addGroup($usersGroup);
		
		$throttle = Sentry::getThrottleProvider()->findByUserId($user->id);
		$throttle->unsuspend();
		
		
		
	}
}