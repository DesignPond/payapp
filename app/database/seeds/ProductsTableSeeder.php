<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			Product::create([
				 'title' => $faker->colorName ,
				 'price' => $faker->randomFloat(2,70,300) , 
				 'image' => 'fantasy.jpg' 
			]);
		}
	}

}