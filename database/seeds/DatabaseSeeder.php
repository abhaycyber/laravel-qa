<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run_11thnov2019()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\User::class, 3)->create()->each(function($u){

            $u->questions()
            ->saveMany(

factory(App\Question::class, rand(1,5))->make()

            )->each(function ($q)
            {

                $q->answers()->saveMany(factory(App\Answer::class, rand(1,5))->make());

            });

        });


            
        
       // factory(App\Question::class, 10)->create();



    }

    public function run()
    {
       
        $this->call([

           UsersQuestionsAnswersTableSeeder::class, 
           FavoritesTableSeeder::class, 

        ])


    }

}
