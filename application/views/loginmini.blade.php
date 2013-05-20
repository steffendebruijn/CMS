{{ Form::open('login', 'POST', array('class' => 'form-signin', 'id' => 'ajaxLoginForm' )) }}
<h2 class="form-signin-heading">Inloggen</h2> <br />
<!--check for login errors flash var-->
@if (isset($login_errors))
<p class="alert alert-error text-error">Username or password incorrect.</p>
@endif
<!--username field-->
{{ Form::text('username', NULL, array('class' => 'input-block-level', 'placeholder' => 'Username')) }}
<!--password field-->
{{ Form::password('password', array('class' => 'input-block-level', 'placeholder' => 'Password')) }}