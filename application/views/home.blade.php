@include('layout.header')
<div class="header">
  
    
</div>

<div class="container">
@foreach ($entries as $entry)
<h1>{{ HTML::link('article/view/'.$entry->entryid, $entry->title) }} </h1><br />
<p> {{$entry->body}}</p>
<small>{{$entry->username}} | {{date("F j Y, G:i:s", strtotime($entry->created_at))}}</small>
<hr />
@endforeach
</div>
