<?php
class Author extends Eloquent {
    public static $table = 'author';
    
    public function entries()
    {
        return $this->belongs_to('Entries', 'author_id');
    }
}
?>
