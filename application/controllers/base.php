<?php

class Base_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'auth')->except($this->get_array());
    }

    /**
     * Catch-all method for requests that can't be matched.
     *
     * @param  string    $method
     * @param  array     $parameters
     * @return Response
     */
    public function __call($method, $parameters)
    {
        return Response::error('404');
    }

    private function get_array()
    {
        return array(
            'index',
            'login'
        );
    }

}