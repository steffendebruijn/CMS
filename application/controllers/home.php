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
        $commentCount = array();
        foreach ($entries as $entry) {
            $commentCount[$entry->entryid] = Comments::countComments($entry->entryid);
        }
        return View::make('home')->with('entries', $entries)->with('commentCount', $commentCount);
    }
}
?>