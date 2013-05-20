<?php

class Home_Controller extends Base_Controller
{
    public $restful = true;
    public function __construct()
    {
        //parent::__construct();
    }

    public function get_index()
    {
        $entries = Entries::get_entries();
        
        return View::make('home')->with('entries', $entries);
    }

      
}?>