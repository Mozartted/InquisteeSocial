<!--The Navigation bar of the app-->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="{{url('/logout')}}">Logout</a></li>
</ul>
<nav class="nav-wrapper">

        <div class="nav-wrapper red darken-1">
                            @if (Auth::check())
                                <ul class="left">
                                    <li class="nav-notifying">
                                        <a href="https://twitter.com/">

                                            <span class="text"><i class="material-icons">home</i></span>
                                        </a>
                                    </li>
                                    <li  class="nav-notifying">
                                        <a href="https://twitter.com/">
                                            <span class="text"><i class="material-icons">notifications</i></span>
                                        </a>
                                    </li>
                                    <li class="nav-notifying">
                                        <a href="https://twitter.com/">
                                            <span class="text"><i class="material-icons">message</i></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="log-section input-field right">
                                    <div class="log-image row">
                                        @if(empty(Auth::user()->profile->profileMedia->url))
                                            <div class="col s2  dropdown-button" data-activates="dropdown1" ><img class="circle" src="{{asset('images/profile/myAvatar.png')}}"/></div>
                                        @else
                                            <div class="col s2  dropdown-button" data-activates="dropdown1"><img class="circle" src="{{asset(Auth::user()->profile->profileMedia->url)}}"/></div>
                                        @endif

                                        <div class="col s10 center-align"><span>{{Auth::user()->profile->first_name}}</span></div>

                                    </div>
                                </div>
                                <div class="input-field right">
                                    <input id="search" type="search" required>
                                    <label for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            @endif




            <a href="#" class="brand-logo center">Lovenote</a>


        </div>
  </nav>
