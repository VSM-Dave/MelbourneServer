<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        $faker = Faker::create();

        foreach (range(1,40) as $index) {
        	DB::table('comments')->insert([
        	[
        		'user_id' 		=> '1',
        		'content' 		=> $faker->sentence($nbWords = 15, $variableNbWords = true),
        		'post_id' 		=> $faker->numberBetween($min = 1, $max = 20),
                'created_at'    => $faker->dateTimeBetween('-1 month', 'now'),
                'updated_at'    => $faker->dateTimeBetween('-1 month', 'now')
        	]
        	]);
        }
    }
}
