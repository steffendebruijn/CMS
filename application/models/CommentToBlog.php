<?php

/**
 * Description of Comment_to_blog
 *
 * @author steffen
 */
class CommentToBlog extends Eloquent
{

    public static $table = 'comment_to_blog';
    public static $timestamps = false;

    public static function addCommentToBlog($entry_id, $comment_id)
    {
        $comment_to_blog = new CommentToBlog;
        $comment_to_blog->blog_id = $entry_id;
        $comment_to_blog->comment_id = $comment_id;
        if($comment_to_blog->save()){
            return true;
        } else {
            return false;
        }
    }
}
