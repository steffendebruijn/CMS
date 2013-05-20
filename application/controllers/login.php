<?php

class Login_Controller extends Base_Controller
{

    public $restful = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_login()
    {
        return View::make('login');
    }

    public function post_login()
    {
        $arguments['username'] = Input::get('username');
        $arguments['password'] = Input::get('password');
        $arguments['remember'] = false;
        if (Auth::attempt($arguments))
        {
            if (!Request::ajax())
            {
                return Redirect::to('home');
            }
            else
            {
                return true;
            }
        }
        else
        {
            if (!Request::ajax())
            {
                return Redirect::to('login')->with('login_errors', true);
            }
            else
            {
                return View::make('loginmini')->with('login_errors', true);
            }
        }
    }

    public function get_register()
    {
        return View::make('register');
    }

    public function post_register()
    {
        
    }

    public function get_logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

}

?>
