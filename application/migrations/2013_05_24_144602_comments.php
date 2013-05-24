<?php

class Comments {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function($table) {
                    $table->create();
                    $table->increments('id');
                    $table->string('comment');
                    $table->integer('user_id')->index()->unsigned();
                    $table->timestamps();
                    $table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
                });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}