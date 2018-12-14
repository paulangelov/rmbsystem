<!-- Header -->
@include('layouts.login-header')
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                    {{ Form::open(array('url' => 'sign-in', 'method' => 'post', 'class' => 'login100-form validate-form', 'id' => 'loginform')) }}
					<span class="login100-form-title p-b-26">
						Welcome, Guest
					</span>
					
					@if($errors->any())
						<span>
							<p align="center">{{$errors->first()}}</p>
						</span>
					@endif
					
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					@if($errors->has('accountid'))
							<span>{{$errors->first('accountid')}}</span>
					@endif

					<div class="wrap-input100 validate-input" data-validate = "Valid Account ID: 12****78">
						<input class="input100" type="text" name="accountid" id="accountid" placeholder="Account ID" value="{{ old('accountid') }}">
					</div>	

					@if($errors->has('password'))
							<span>{{$errors->first('password')}}</span>
					@endif

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name="submit" id="submit">
								Sign in
							</button>
						</div>
					</div>

					<div class="text-center p-t-115"></div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!-- Footer -->
@include('layouts.login-footer')