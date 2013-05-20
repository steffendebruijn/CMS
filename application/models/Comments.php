<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments
 *
 * @author steffen
 */
class Comments extends Eloquent
{

    public static $table = 'comments';

    public static function getCommentsByEntryId($entry_id)
    {
        return Comments::join('comment_to_blog','comments.id','=','comment_to_blog.comment_id')
                        ->where('comment_to_blog.blog_id', '=', $entry_id)->join('users', 'comments.user_id', '=', 'users.id')
                        ->get(array("users.username",
                                    "comments.*"));
        //put your code here
        
    }
    
    public static function addComment($comment, $entry_id)
    {
        //addcomment
        return false;
    }
}
?>
