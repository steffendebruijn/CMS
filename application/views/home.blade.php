@include('layout.header')

@foreach ($entries as $entry)
<h1>{{ HTML::link('article/view/'.$entry->entryid, $entry->title) }} </h1><br />
<p> {{$entry->body}}</p>
<small>{{$entry->username}} | {{date("F j Y, G:i:s", strtotime($entry->created_at))}} | Comments: {{$commentCount[$entry->entryid]}}</small>
<hr />
@endforeach
@include('layout.bottom')
