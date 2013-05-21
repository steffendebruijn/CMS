<?php

/**
 * Description of comments
 *
 * @author steffen
 */
class Comments_controller extends Base_Controller
{

    public $restful = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function post_addcomment($entry_id)
    {
        //var_dump(1);
        $rtrnd = Comments::addComment(Input::get(), $entry_id);
        var_dump($rtrnd);
        if ($rtrnd) {
            return Redirect::to('article/view/'.$entry_id)->with('alert-sucess', 'Comment has been submitted');
        }
        return Redirect::to('article/view/'.$entry_id)->with('alert-error', 'Well this is embarrasing...');
    }
}
