<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('groups')->truncate();
		
		Sentry::getGroupProvider()->create(array(
			'name'		=> 'Admins',
			'permissions' => array(
				'admin' => 1,
				'users' => 1,
			)
		));
		
		Sentry::getGroupProvider()->create(array(
			'name'		=> 'Users',
			'permissions' => array(
				'users' => 1,
			)
		));
	}

}
