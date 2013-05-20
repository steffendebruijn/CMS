
<head>
    <style type="text/css">

    </style>
</head>
{{ Asset::container('bootstrapper')->styles() }}
{{ Asset::container('bootstrapper')->scripts() }}
<div class="container">
    
@include('loginmini')
<!--submit button-->
<div class="row-fluid">
    {{ Form::submit('Login', array('class'=>'btn btn-large span4 offset8')) }}
</div>
{{ Form::close() }}
</div>
