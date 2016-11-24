@extends('layout.default')
@section('content')
    <body>
        <div>
            @include('layouts.partials.nav')
      <div>
          <div class="row">
              <div class="col 12 m6" style="margin:auto; float:inherit">
                  <div class="card sections">
                      <div class="card-header">
                          <div class="header header-title" >
                              <span class="header_medium color-grey">Welcome To Lovenote</span>
                              <p><small class="color-grey">Complete Your SignUp</small></p>
                          </div>
                      </div>
                      <div class="card-action sections">
                          <div class="col s12 nav-extended">
                              <ul class="tabs tabs-transparent">
                                  <li class="tab"><a  class="active" href="#upload">
                                      <span class="profile-menu-icon">
                                       Upload
                                    </span></a>
                                </li>
                                  <li class="tab"><a href="#profile"><span class="profile-menu-icon">
                                       profile
                                  </span></a></li>
                                  <li class="tab"><a href="#invite"><span class="profile-menu-icon">
                                       Invite
                                  </span></a></li>
                                  <li class="tab"><a href="#follow"><span class="profile-menu-icon">
                                       Follow
                                  </span></a></li>

                              </ul>
                          </div>
                      </div>
                      <div class="card-content sections">
                         <form>
                             <div class="col s12" id="profile">
                                 <div class="input-field">
                                     <label for="description">
                                         Describ Yourself There's enough time
                                     </label>
                                     <textarea id="description" class="materialize-textarea"></textarea>
                                 </div>

                                 <div class="input-field">
                                     <label for="place">
                                         Where are you from
                                     </label>
                                     <textarea id="place" class="materialize-textarea"></textarea>
                                 </div>
                             </div>
                             <div class="col s12" id="upload">
                                 <div class="col s12">
                                     <span class="header_medium color-grey">Upload A Profile Picture</span>
                                 </div>
                                 <div class="divider"></div>
                                 <div class="col s12">

                                     <form>
                                         <div class="col s12">
                                             <div id="upload-demo"></div>
                                             <input type="hidden" id="imagebase64" name="imagebase64">

                                         </div>

                                         <div class="divider"></div>
                                         <div class="col s12">
                                             <a class="btn file-btn">
                                                 <span>Upload</span>
                                                 <input type="file" id="uploading" accept="image/*">
                                             </a>


                                             <button  class="btn-flat upload-result">Send</button>
                                         </div>
                                     </form>
                                 </div>

                             </div>
                             <div class="" id="invite"></div>
                             <div class="" id="follow"></div>
                        </form>
                      </div>
                      <div class="card-action sections">
                          <div class="input-field right">
                              <button class="btn btn-floating"><i class="material-icons">send</i></button>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
    </div>
    </body>
    @include('layouts.partials.scripts')

@endsection
