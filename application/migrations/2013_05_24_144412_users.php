<?php

class Users
{

    /**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
                    $table->create();
                    $table->increments('id');
                    $table->string('username');
                    $table->string('password');
                    $table->integer('has_admin_rights')->default(0);
                    $table->timestamps();
                });
        DB::table('users')->insert(array('username' => 'admin',
                                          'password' => Hash::make('test'),
                                            'has_admin_rights'=> 1));
    }

    /**
     * Revert the changes to the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}