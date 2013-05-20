@include('layout.header')
{{ Form::open('article/new', 'POST') }}
{{ Form::text('title', NULL, array('class'=>'input-xlarge', 'placeholder' => 'Title')) }}<br />
{{ Form::textarea('body', NULL, array('class'=>'input-xxlarge', 'placeholder' => 'Body'))}}<br />
{{ Form::submit('Submit')}}
{{ Form::close() }}
