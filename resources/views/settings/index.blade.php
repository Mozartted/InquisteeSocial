@extends('layouts.default')
@section('content')
    @include('settings.partials.style')
    <body>
    <div>
    @include('layouts.partials.nav')
  <div>
      <div class="row">
          <div class="col s12 m3 hide-on-small-only">
              @include('settings.partials.settingside')
          </div>
          <div class="col s12 m5">

              <!--Account Id tags start here-->
              <div id="account">
                  <div class="card sections min-margin">
                      <div class="card-header">
                          <div class="header header-title" >
                              <span class="header_medium color-grey">Account Settings</span>
                              <p><small class="color-grey">Change you account setting and configurations</small></p>
                          </div>
                      </div>
                      <div class="card-content">

                          <div class="settings-form border-set">
                          <div>
                              <form id="account-form" class="t1-form form-horizontal requires-password" autocomplete="off" method="POST" action="https://twitter.com/settings/accounts/update">
                                  <div id="settings-alert-box" class="alert hidden">
                                      <span id="settings-alert-close" class="icon close"></span>
                                  </div>


                                  <div id="username_fieldset" class="input-field col s12">
                                      <label for="user_screen_name" class="t1-label control-label">Username</label>
                                      <input id="user_screen_name" maxlength="15" name="user[screen_name]" type="text" value="MozOsita">
                                      <small class="notification">https://twitter.com/<span id="username_path">MozOsita</span></small>

                                  </div>

                                  <div id="email_fieldset" class="input-field col s12">
                                      <label for="user_email" class="t1-label control-label">Email</label>
                                      <p id="email_notification" class="notification"></p>
                                      <input id="user_email" maxlength="15" name="user[email]" type="text" value="mozart.osita@gmail.com">
                                      <small>
                                          Email will not be publicly displayed.
                                          <a href="https://support.twitter.com/articles/15356" target="_blank">Learn more</a>.
                                      </small>
                                  </div>
                                  <div class="divider"></div>
                                  <div class="form-actions">
                                      <button id="settings_save" class="btn primary-btn" type="submit">Save changes</button>
                                      <span class="spinner-small settings-save-spinner"></span>
                                  </div>
                                  <div class="card-action">
                                      <div class="control-group form-centering">
                                          <div class="controls">
                                              <small><a id="account_deactivate_link" href="#deactivate" data-toggle="tab" aria-expanded="true">Deactivate my account</a></small>
                                          </div>
                                      </div>
                                  </div>

                              </form>

                          </div>
                      </div>

                      </div>

                  </div>
              </div>

              <div id="notifyuse">
                  <div class="card sections min-margin">
                      <div class="card-header">
                          <div class="header header-title" >
                              <span class="header_medium color-grey">Notifications</span>
                              <p><small class="color-grey">Set up your notifications</small></p>
                          </div>
                      </div>
                      <div class="card-content">

                          <div class="settings-form border-set">
                              <div>
                                  <form class="t1-form form-horizontal requires-password" autocomplete="off" method="POST" action="https://twitter.com/settings/accounts/update">

                                      <div id="notifications" class="row sections" style="height: 200px;display: block;margin: 5px;">
                                          <label for="user_screen_name" class="t1-label control-label">What kind of notifications you want to receive?</label>

                                          <div class="input-field checkbox">
                                              <input id="notify_like" name="email_notify[value]" type="checkbox" >
                                              <label for="notify_like">Notifications on likes</label>
                                          </div>
                                          <div class="input-field checkbox">
                                              <input id="notify_vote" name="email_notify[value]" type="checkbox">
                                              <label for="notify_vote">Notifications of votes</label>
                                          </div>
                                          <div class="input-field">
                                              <input id="notify_interest"name="email_notify[value]" type="checkbox" >
                                              <label for="notify_interest">Notifications of Interest</label>
                                          </div>
                                          <div class="input-field">
                                              <input id="notify_followers"  name="email_notify[value]" type="checkbox" >
                                              <label for="notify_followers">Notifications of Followers</label>
                                          </div>
                                      </div>
                                      <div class="divider"></div>
                                      <div class="form-actions">
                                          <button id="settings_save" class="btn primary-btn" type="submit">Save changes</button>
                                          <span class="spinner-small settings-save-spinner"></span>
                                      </div>
                                      <div class="card-action">
                                          <div class="control-group form-centering">
                                              <div class="controls">
                                                  <small><a id="account_deactivate_link" href="#deactivate" data-toggle="tab" aria-expanded="true">Deactivate my account</a></small>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <div id="emailsec">

                  <div class="card sections min-margin">
                      <div class="card-header">
                          <div class="header header-title" >
                              <span class="header_medium color-grey">Email Notifications</span>
                              <p><small class="color-grey">set your notifications</small></p>
                          </div>
                      </div>
                      <div class="card-content">
                          <div class="settings-form border-set">
                              <div>
                                  <form class="t1-form form-horizontal requires-password" autocomplete="off" method="POST" action="https://twitter.com/settings/accounts/update">

                                      <div id="email-notifications" class="">
                                          <label for="user_screen_name" class="t1-label control-label">Do You want to recieve email notifications</label>

                                          <div class="input-field radio">
                                              <input id="notify_yes" name="email_notify[value]" type="radio" >
                                              <label for="notify_yes">Yes</label>

                                              <input id="notify_no"  name="email_notify[value]" type="radio" >
                                              <label for="notify_no">No</label>
                                          </div>
                                          <div class="divider"></div>
                                      </div>

                                      <div id="email_fieldset" class="control-group">

                                          <div class="input-field">
                                              <label for="user_email" class="t1-label control-label">Email</label>
                                              <input id="user_email" class="email-input" name="user[email]" type="text" value="mozart.osita@gmail.com">
                                              <small>Enter Email to confirm. <a href="https://support.twitter.com/articles/15356" target="_blank">Learn more</a>.</small>
                                          </div>
                                      </div>

                                      <div class="form-actions">
                                          <button id="settings_save" class="btn primary-btn" type="submit">Save changes</button>
                                          <span class="spinner-small settings-save-spinner"></span>
                                      </div>

                                      <hr>

                                      <div class="card-action">
                                          <div class="controls">
                                              <p><a id="account_deactivate_link" href="https://twitter.com/settings/accounts/confirm_deactivation">Deactivate my account</a></p>
                                          </div>
                                      </div>
                                  </form>

                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
          <div class="col s4 m3 hide-on-small-only">
              @include('layouts.partials.footer')

              </div>
          </div>

      </div>
  </div>

</body>
@endsection
