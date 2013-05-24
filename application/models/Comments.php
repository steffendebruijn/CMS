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
    public static $timestamps = true;

    public static function getCommentsByEntryId($entry_id)
    {
        return Comments::join('comment_to_blog','comments.id','=','comment_to_blog.comment_id')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->where('comment_to_blog.blog_id', '=', $entry_id)
                ->get(array("users.username",
                            "comments.*"));
        //put your code here
        
    }
    
    public static function addComment($comment, $entry_id)
    {
        //var_dump($comment);
        $newcomment = new Comments;
        $newcomment->comment = $comment['comment'];
        $newcomment->user_id = Auth::user()->id;
        $newcomment->save();
        CommentToBlog::addCommentToBlog($entry_id, $newcomment->id);
        return true;
        
    }
    
    public static function countComments($entry_id){
        return Comments::join('comment_to_blog','comments.id','=', 'comment_to_blog.comment_id')
                ->where('comment_to_blog.blog_id', '=', $entry_id)->count();
    }
}
?>
