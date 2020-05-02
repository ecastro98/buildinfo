<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGithubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github', function (Blueprint $table) {
            $table->id();
            $table->string('Revision');
            $table->string('URL');
            $table->string('LogMessage');
            $table->dateTime('Date');
            $table->string('SHA');
            $table->string('Author');
            $table->string('AuthorAvatarURL');
            $table->string('AuthorURL');
            $table->string('Version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('github');
    }
}
