<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
  <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
  <title><?php echo $title?></title>
  </head>
  <body>
    <div class="alert" style="transform: translate(0%,-55%)">
      @include('alerts.success')
      @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
          </ul>
        </div>
      @endif
    </div>
    <div class="container" id="container" style="margin-top: -95px;">
      <div class="form-container sign-up-container">
        <form method="post" action="/register" id="myForm">
          @csrf
          <div class="from-group">
            <div class="form-outline mb-4">
              <label for="nim">NIM</label>
              <input type="text" class="form-control inline" name="nim" placeholder="NIM" value="{{ old('nim') }}">
            </div>
          </div>
          <div class="from-group">
            <div class="form-outline mb-4">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="from-group">
            <div class="form-outline mb-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
          </div>
          <div class="from-group">
            <div class="form-outline mb-4">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <small id="register-password-feedback" class="form-text text-danger d-none">
                Password minimal {{ config('app.password_min_length') }} karakter
              </small>
            </div>
          </div>
          <button type="submit" class="btn mb-4">Sign up</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form method="post" action="/login">
          @csrf
          <h1 class="mb-4" style="color: #585858;">SIGN IN</h1>
          <div class="form-outline mb-4">
            <label for="email">Email</label>
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          </div>
          <div class="form-outline mb-4">
            <label for="password">Password</label>
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          </div>
          <div class="text-center pt-1 mb-2 pb-1">
            <button class="btn mt-2" type="submit">Sign In</button>
          </div>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <div class="text-center pt-1 mb-2 pb-1">
              <button class="btn btn-signup btn-block fa-lg mb-3 ghost" type="submit" id="signIn">Sign In</button>
            </div>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <div class="text-center pt-1 mb-2 pb-1">
              <button class="btn btn-signup btn-block fa-lg mb-3 ghost" type="submit" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
  
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');
  
  signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });
  
  signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });
  
  document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("register-password");
    const feedback = document.getElementById("register-password-feedback");
    const minLength = {{ config('app.password_min_length') }};

    passwordInput.addEventListener("input", function () {
      if (passwordInput.value.length < minLength) {
        passwordInput.classList.add("is-invalid");
        passwordInput.classList.remove("is-valid");
        feedback.classList.remove("d-none");
      } else {
        passwordInput.classList.remove("is-invalid");
        passwordInput.classList.add("is-valid");
        feedback.classList.add("d-none");
      }
    });
  });

</script>
<style>

* {
	box-sizing: border-box;
  overflow: hidden;
  font-family: 'Josefin Sans';
}

body {
	background : #dbd6ff;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
  font-family: "Poppins", sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
  color : white;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

.container label{
  font-weight: 500;
}

span {
	font-size: 12px;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

form {
	background-color: #ffffff;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: start;
}

.container .form-control {
	width: 275px;
}

.container .form-control .inline{
	width: 50px;
}

.container .btn{
  width: 150px;
  background-color: #6E75F4;
}

.container .form-control{
  color: #2c3a5c;
}

.container {
	border-radius: 13px;
  box-shadow: 0 7px 7px rgba(0,0,0,0.25), 3px 7px 7px rgba(0,0,0,0.25);
	position: relative;
	overflow: hidden;
	width: 1000px;
  height: 500px;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
  width: 500px;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #1a1e34, #1a1e34);
	background: linear-gradient(to right, #6E75F4, #6E75F4);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}
</style>