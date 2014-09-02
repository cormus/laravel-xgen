<div class="container marketing">
    <div class="page-title pull-left width-100">
        <h1 class="pull-left">Login<small>Login</small></h1>
    </div>
    {{ Form::open(array('url' => Request::url(), 'name' => 'login-form', 'role' => 'form')) }}
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', $email,  array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email')) }}
                </div>
                <div class="form-group">
                    @if($message)
                        <div class="alert alert-danger">{{ $message }}</div>
                    @endif
                </div>
                {{ Form::button('Enviar', array('class' => 'btn btn-primary', 'type' => 'submith')) }}
        </div>
        <div class="col-md-4"></div>
    </div>
    {{ Form::close() }}
</div><!--/container-->