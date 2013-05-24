<?php

class Entries {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function($table) {
                    $table->create();
                    $table->increments('id');
                    $table->string('title', 128);
                    $table->string('body');
                    $table->integer('users_id')->unsigned();
                    $table->index('users_id');
                    $table->integer('last_edited_by');
                    $table->foreign('users_id')->references('id')->on('users')->on_delete('no action');
                    $table->timestamps();
                });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entries');
	}

}