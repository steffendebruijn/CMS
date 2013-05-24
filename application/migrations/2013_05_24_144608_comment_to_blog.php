<?php

class Comment_To_Blog {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comment_to_blog', function($table) {
                    $table->create();
                    $table->integer('comment_id')->unsigned();
                    $table->index('comment_id');
                    $table->integer('blog_id')->unsigned();
                    $table->index('blog_id');
                    $table->foreign('comment_id')->references('id')->on('comments')->on_delete('cascade');
                    $table->foreign('blog_id')->references('id')->on('entries')->on_delete('cascade');
                });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment_to_blog');
	}

}