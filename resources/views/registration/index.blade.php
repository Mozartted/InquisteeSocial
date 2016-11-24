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
                                                    <input type="password" id="password" name="password">
                                                    <label for="password">Pick a password</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input type="password" id="confirm-password" name="password_confirmation">
                                                    <label for="confirm-password">Confirm password</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <div class="col s6">
                                                        <input name="gender" type="radio" id="male" />
                                                        <label for="male">Male</label>
                                                    </div>
                                                    <div class="col s6">

                                                        <input name="gender" type="radio" id="female" />
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                                <div class="input-field col s12">
                                                    {!!Form::date('birthday','',['class'=>'datepicker','id'=>'birthday'])!!}
                                                    {!!Form::label('birthday','birthday',['for'=>'birthday'])!!}
                                                </div>
                                                <div class="input-field col s12">
                                                    <button class=" red margining-2 btn waves-effect waves-light col s12" type="submit" name="action">Create Your Account
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>

                                            {!!Form::close()!!}

                                        </div>

                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Login With Lovenote</div>
                                    <div class="collapsible-body padding-10">
                                        <div class="input-field">
                                            <input type="text" id="username">
                                            <label for="username">Username or Email</label>
                                        </div>
                                        <div class="input-field">
                                            <input type="text" id="username">
                                            <label for="username">Username or Email</label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">place</i>Login With Facebook</div>
                                    <div class="collapsible-body">
                                        <button class=" blue margining-2 btn waves-effect waves-light col s12" type="submit" name="action">Login with Facebook
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Login With Google</div>
                                    <div class="collapsible-body">
                                        <button class=" red margining-2 btn waves-effect waves-light col s12" type="submit" name="action">Login with Google
                                            <i class="material-icons right">send</i>
                                        </button>
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
    </div>
    </body>
@endsection
