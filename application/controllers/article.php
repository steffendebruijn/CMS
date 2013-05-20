<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author steffen
 */
class Article_controller extends Base_Controller
{

    public $restful = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_index($entry_id)
    {
        $entry = Entries::getEntryById($entry_id);
        $comments = Comments::getCommentsByEntryId($entry_id);
        return View::make('singleentry')
                        ->with('entry', $entry)
                        ->with('comments', $comments);
    }

    public function get_new()
    {
        return View::make('newentry');
    }

    public function post_new()
    {
        $result = Entries::setNewEntry(Input::get());
        if (is_numeric($result))
        {
            return Redirect::to('article/view/'.$result)->with('alert-success', 'Entry has been saved');
            //redirect to singleentry (worked)
        }
        else
        {
            return Redirect::to('home')->with('alert-error', 'Well this is embarrasing... It didn\'t seem to work.');
            //redirect to singleentry (didnt work)
        }
    }

    public function get_edit($entry_id)
    {
        $entry = Entries::getEntryById($entry_id);
        return View::make('editentry')
                        ->with('entry', $entry);
    }

    public function post_edit($entry_id)
    {
        $arguments = array(
            "entry_id" => $entry_id,
            "title" => Input::get('title'),
            "body" => nl2br(Input::get('body'))
        );
        $result = Entries::editEntryById($arguments);
        if ($result)
        {
            return Redirect::to('article/view/'.$entry_id)->with('alert-success', 'Entry has been edited');
            //redirect to singleentry (worked)
        }
        else
        {
            return Redirect::to('article/view/'.$entry_id)->with('alert-error', 'Well this is embarrasing...');
            //redirect to singleentry (didnt work)
        }
    }

    public function post_delete()
    {
        $result = Entries::deleteEntry(Input::get('delete'));
        if ($result)
        {
            return Redirect::to('home')->with('alert-success', 'Entry has been deleted');
            //redirect to singleentry (worked)
        }
        else
        {
            return Redirect::to('home')->with('alert-error', 'Well this is embarrasing...');
            //redirect to singleentry (didnt work)
        }
    }

    public function post_addcomment($entry_id, $comment_id = 0)
    {
        if ($comment_id == 0)
        {
            $rtrnd = Comment::addComment($Input::get(), $entry_id, $comment_id);

            if ($rtrnd)
            {
                return Redirect::to('');
            }
            return Redirect::to();
        }

        echo $entry_id.'/';
        echo $comment_id;
    }

}
?>