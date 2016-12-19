@extends('layouts.default')
@section('content')
    <body class="background-main red darken-2">

        <nav>
            <div class="nav-wrapper  white red-text">
                <a href="#" class="brand-logo center red-text">Lovenote</a>
                    <ul id="nav-mobile" class="right">
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Login</a></li>
                    </ul>
                </div>
      </nav>
      <div class="container">
          <div class="row">



                    <div class="screen-center mid-size card" style="overflow:hidden">
                        <div class="card-header orange darken-3 white-text padding-5">
                            <div class="card-title"><span>Welcome to Lovenote</span></div>
                        </div>


                        <div class="card-content">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                    @if($errors->count())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{!! $error!!}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @elseif(Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            <p><strong>We're sorry!  </strong>{!!  Session::get('error') !!}</p>
                                        </div>
                                    @endif
                                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Create and Account</div>
                                        <div class="collapsible-body padding-10">
                                            {!! Form::open()!!}
                                                <div class="input-field col s6">
                                                    <input type="text" id="firstname" name="firstname">
                                                    <label for="username">Firstname</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input type="text" id="lastname" name="lastname">
                                                    <label for="lastname">Lastname</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input type="text" id="username" name="username">
                                                    <label for="username">Pick a cute Username</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input type="email" id="email" name="email">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input type="password" id="password" name="password">
                                                    <label for="password">Pick a password</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input type="password" id="confirm-password" name="password_confirmation">
                                                    <label for="confirm-password">Confirm password</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <div class="col s6">
                                                        <input name="gender" type="radio" id="male" value="male"/>
                                                        <label for="male">Male</label>
                                                    </div>
                                                    <div class="col s6">
                                                        <input name="gender" type="radio" id="female" value="female"/>
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                        <div class="divider"></div>
                                                <div class="col s12">
                                                    <div class="row">
                                    					<div class="col s3">
                                    						<div class="input-field">

                                    				        	{!!Form::select('month', [
                                    							        		'01' => '1',
                                    							        		'02' => '2',
                                    							        		'03' => '3',
                                    							        		'04' => '4',
                                    							        		'05' => '5',
                                    							        		'06' => '6',
                                    							        		'07' => '7',
                                    							        		'08' => '8',
                                    							        		'09' => '9',
                                    							        		'10' => '10',
                                    							        		'11' => '11',
                                    							        		'12' => '12'], 01, ['class' => 'form-control', 'id' => 'month'])!!}
                                                                <label></label>
                                    						</div>
                                    					</div>
                                    					<div class="col s3">
                                    						<div class="input-field">

                                    				        	{!! Form::select('day', [
                                    								        		'01' => '1',
                                    								        		'02' => '2',
                                    								        		'03' => '3',
                                    								        		'04' => '4',
                                    								        		'05' => '5',
                                    								        		'06' => '6',
                                    								        		'07' => '7',
                                    								        		'08' => '8',
                                    								        		'09' => '9',
                                    								        		'10' => '10',
                                    								        		'11' => '11',
                                    								        		'12' => '12',
                                    								        		'13' => '13',
                                    								        		'14' => '14',
                                    								        		'15' => '15',
                                    								        		'16' => '16',
                                    								        		'17' => '17',
                                    								        		'18' => '18',
                                    								        		'19' => '19',
                                    								        		'20' => '20',
                                    								        		'21' => '21',
                                    								        		'22' => '22',
                                    								        		'23' => '23',
                                    								        		'24' => '24',
                                    								        		'25' => '25',
                                    								        		'26' => '26',
                                    								        		'27' => '27',
                                    								        		'28' => '28',
                                    								        		'29' => '29',
                                    								        		'30' => '30',
                                    								        		'31' => '31'
                                    								       ], 01, ['id' => 'day','class' => 'form-control']) !!}
                                                                           <label></label>
                                    						</div>
                                    						</div>
                                    						<div class="col s4">
                                    							<div class="input-field">
                                    								{!!Form::label('year', null, ['class' => '','id'=>'year'])!!}
                                    							    {!!Form::text('year', null, ['class' => '','id'=>'year'])!!}
                                    					        </div>
                                    						</div>

                                    				</div>
                                                </div>
                                                <div class="input-field col s12">
                                                    <button class=" red margining-2 btn waves-effect waves-light col s12" type="submit">Create Your Account
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>

                                            {!!Form::close()!!}

                                        </div>

                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Login With Lovenote</div>
                                    <div class="collapsible-body padding-10">
                                        @if($errors->count())
                                            <div class="alert alert-danger" role="alert">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{!! $error!!}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @elseif(Session::has('error'))
                                            <div class="alert alert-danger" role="alert">
                                                <p><strong>We're sorry!  </strong>{!!  Session::get('error') !!}</p>
                                            </div>
                                        @endif
                                        {!!Form::open(['url'=>'login'])!!}
                                        <div class="input-field">
                                            <input type="text" id="username" name="username">
                                            <label for="username">Username or Email</label>
                                        </div>
                                        <div class="input-field">
                                            <input type="password" id="password" name="password">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <button class=" red margining-2 btn waves-effect waves-light col s12" type="submit">Login
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                        {!! Form::close()!!}
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">place</i>Login With Facebook</div>
                                    <div class="collapsible-body">
                                        <a href="social/login/redirect/facebook">
                                        <button class=" blue margining-2 btn waves-effect waves-light col s12" type="submit" name="action">Login with Facebook
                                            <i class="material-icons right">send</i>
                                        </button>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Login With Google</div>
                                    <div class="collapsible-body">
                                        <a href="social/login/redirect/google">
                                        <button class=" red margining-2 btn waves-effect waves-light col s12" type="submit" name="action">Login with Google
                                            <i class="material-icons right">send</i>
                                        </button>
                                        </a>
                                    </div>
                                </li>

                                </ul>
                        <div class="card-action">
                            <a href="#"><small>New? Create and Account</small></a>
                            <a href="#"><small>Forgot Password</small></a>
                        </div>



                    </div>



          </div>
      </div>
      </div>
        @include('layouts.partials.footer')
    </body>
@endsection
