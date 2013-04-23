<?php

use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table){
                    $table->increments('id'); //coluna de id auto-increment
                    $table->string('titulo', 100); //coluna de titulo, varchar de 100 caracteres
                    $table->boolean('status')->default(FALSE); //booleano iniciando em falso
                    
                    //criando duas colunas, uma marca o timestamp de quando a TASK é criada e a outra coluna
                    //marca o timestamp de quando a TASK for alterada
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
		Schema::dropIfExists('tasks'); //se a tabela existir, exclui
	}

}