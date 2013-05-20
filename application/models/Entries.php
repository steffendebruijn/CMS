<?php
class Entries extends Eloquent {
    public static $table = 'entries';
    public static $timestamps = true;

  public static function get_entries(){
      return Entries::left_join('users', 'entries.users_id', '=', 'users.id')
              ->get(array('entries.id as entryid', 
                          'entries.title', 
                          'entries.body', 
                          'entries.created_at', 
                          'users.id as user_id', 
                          'users.username'
                         ));
  }
  
  public static function getEntryById($entry_id){
      return Entries::left_join('users', 'entries.users_id', '=', 'users.id')
              ->where('entries.id', '=', $entry_id)
              ->get(array('entries.id as entryid', 
                          'entries.title', 
                          'entries.body', 
                          'entries.created_at', 
                          'users.id as users_id', 
                          'users.username'
                         ));
  }
  
  public static function getLastEntry(){
      return Entries::last();
  }
  
  public static function editEntryById($arguments){
      $entry = Entries::find($arguments['entry_id']);
      $entry->title = $arguments['title'];
      $entry->body = $arguments['body'];
      return $entry->save();
  }
  
  public static function setNewEntry($arguments){
      $entry = new Entries();
      $entry->title = $arguments['title'];
      $entry->body = $arguments['body'];
      $entry->users_id = Auth::user()->id;
      if($entry->save()){
          return $entry->id;
      } else {
          return false;
      }
  }
  
  public static function deleteEntry($entry_id){
      return Entries::find($entry_id)->delete();
  }
}
?>
