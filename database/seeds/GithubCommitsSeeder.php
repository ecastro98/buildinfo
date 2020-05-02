<?php

use Illuminate\Database\Seeder;

class GithubCommitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GithubCommit::class, 10)->create();
    }
}
