@extends('templates.default')

@section('content')
	<div class="row">
		<div class="col-md-5 col-md-offset-2">
			<h3>Sign Up!</h3>
			<hr>

			{!! form::open(['route' => 'auth.signIn', 'method' => 'POST']) !!}
                    
                {{ form::label('email', 'Email') }}
            
                {{ form::email('email', null, ['class' => 'form-control', 'required']) }}
            
                <br>
     
                {{ form::label('password', 'Password') }}
            
                {{ form::password('password', ['class' => 'form-control', 'required']) }}<br>
            
                {{  form::checkbox('remember') }} &nbsp;{{ form::label('remember', 'Remember me') }}

                <br><br>
             	{{  form::submit('Login', ['class' => 'btn btn-primary btn-sm btn-block']) }}                                       
                           
             {!! form::close() !!}<br>

            <h2 class="text-center">Or</h2>
			<p class="text-center">Not registered yet? &nbsp; <a href="#" data-toggle="modal" data-target="#register">Sign Up!</a></p>
		</div>

		<div class="col-md-4 col-md-offset-1">
			<div class="row">
				<div class="well">
					More info here!
				</div>
			</div>
		</div>
		@include('partials.register_modal')
	</div>
@endsection


