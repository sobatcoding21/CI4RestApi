<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use Faker\Factory;

class DummyuserController extends BaseController
{
	public function index()
	{
		$faker = Factory::create();
		for($i=0;$i<=100;$i++)
		{
			$name = $faker->name();
			$data = [
				'username' 	=> strtolower(url_title($name)),
				'password' 	=> password_hash($name , PASSWORD_DEFAULT),
				'name'		=> $name,
				'address'	=> $faker->address(),
				'phone'		=> $faker->e164PhoneNumber()
			];

			$db = new Users;
			$db->insert($data);
		}
	}
}
