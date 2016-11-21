@extends('layouts.default')
@section('content')
    <body class="background-main">
        <div>
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

                        </div>
                        <div class="card-action">
                            <a href="#"><small>New? Create and Account</small></a>
                            <a href="#"><small>Forgot Password</small></a>
                        </div>



                    </div>



          </div>
      </div>


     @include('layouts.partials.footer')
    </div>
    </body>
@endsection
