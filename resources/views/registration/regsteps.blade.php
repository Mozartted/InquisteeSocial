@extends('layouts.default')
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
                            <div class="tabbed tabbbed-header">
                              <div data-tab="upload" class="active" id="upload-tab">
                                <span class="profile-menu-icon">
                                  Upload Profile Pic
                                </span>
                              </div>
                              <div data-tab="profile" id="profile-tab">
                                <span class="profile-menu-icon">
                                  Update Profile
                                </span>
                              </div>
                            </div>
                              {{-- <ul class="tabs tabs-transparent">
                                  <li class="tab"><a  class="active" href="#upload">
                                      <span class="profile-menu-icon">
                                       Upload Profile Pic
                                    </span></a>
                                </li>
                                  <li class="tab"><a href="#profile"><span class="profile-menu-icon">
                                       Update Profile
                                  </span></a></li>

                              </ul> --}}
                          </div>
                      </div>
                      <div class="card-content sections">
                          <div class="alert alert-danger" role="alert">

                          </div>
                         <form>
                             <div class="col s12 tab-content" id="profile" style="max-height:700px">
                                 <meta name="csrf-token" content="{{ csrf_token()}}">
                                 @include('registration.partials.detailed')
                             </div>
                             <div class="col s12 tab-content active" id="upload" style="max-height:700px">
                                 <div class="col s12">
                                     <span class="header_medium color-grey">Upload A Profile Picture</span>
                                 </div>
                                 <meta name="csrf-token" content="{{ csrf_token()}}">
                                 <div class="divider"></div>
                                 <div class="col s12">

                                     <form>
                                         <div class="col s12">
                                             <div id="upload-into"></div>
                                             <input type="hidden" id="imagebase64" name="imagebase64">

                                         </div>

                                         <div class="divider"></div>
                                         <div class="col s12">
                                             <a class="btn file-btn">
                                                 <span>Upload</span>
                                                 <input type="file" id="uploading" accept="image/*">
                                             </a>
                                             <div  class="btn-flat upload-result">Send</div>
                                         </div>
                                     </form>
                                 </div>

                             </div>

                        </form>
                      </div>
                      <div class="card-action sections">
                          <div class="input-field right">
                              <button class="waves-effect waves-light btn" id="completed" data-func-status="next"><i class="material-icons">send</i>Next</button>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
    </div>
    </body>
    @include('registration.partials.loadingMode')
    @include('layouts.partials.scripts')

@endsection
