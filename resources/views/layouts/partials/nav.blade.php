<!--The Navigation bar of the app-->
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
                                        <div class="col s2"><img class="circle" src="images/profile/myAvatar.png"/></div>
                                        <div class="col s10 center-align"><span>Mozartted</span></div>

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

  
