<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {
    
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        
        
        Schema::table('listas', function($table)
        {
            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    
    
    public function down()
    {
        Schema::table('listas', function($table){
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
        
        Schema::dropIfExists('users');
    }

}