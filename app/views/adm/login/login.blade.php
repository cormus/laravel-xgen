<div class="container marketing">
    {{ Form::open(array('url' => Request::url(), 'name' => 'login-form', 'role' => 'form')) }}
    <div class="width-100-l">
		<div class="login-page-box">
			<h1 class="pull-left width-100-l text-c">Login</h1>
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', $email,  array('class' => 'form-input', 'id' => 'email', 'placeholder' => 'Email')) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Senha') }}
				{{ Form::password('password', array('class' => 'form-input', 'id' => 'password', 'placeholder' => 'Senha')) }}
			</div>
			<div class="form-group">
				<div class="checkbox">
					{{ Form::label('remember_me', 'Lembrar senha') }}
					{{ Form::checkbox('remember_me', 1, $remember_me, array('id' => 'remember_me')) }}
					<a href="{{ URL::to('/login/recover') }}" class="pull-right">Recuperar senha</a>
				</div>
			</div>
			<div class="form-group">
				@if($message)
					<div class="alert alert-danger">{{ $message }}</div>
				@endif
			</div>
			{{ Form::button('Enviar', array('class' => 'btn btn-primary', 'type' => 'submith')) }}
		</div>
    </div>
    {{ Form::close() }}
</div><!--/container-->