@foreach ($variable as $key => $value)
    <div class="card sections min-margin">
        <div class="card-image">

             <img class="status-img" src="images/Lagos-1.jpg">

        </div>
        <div class="card-content">

            <div class="margin-min-10">
                <p class="status-text" style="color:#757575;">
                    The Lagos City View which I love so Much
                </p>
            </div>

        </div>
        <div class="divider"></div>
          <div class="card-content row" style="padding-left:2px;">
              <div class="col s12 row margin-min-10">
                  <div class="col s2">
                      <img src="images/profile/myAvatar.png" class="feed-img-status circle">
                  </div>
                  <div class="col s10">
                      <p class="username-text" style="color:#757575;">Chibuike Osita</p>
                      <small>@mozartted</small>
                      <small> - 3mins ago</small>
                  </div>
              </div>
          </div>
          <div class="card-action">
              <div class="col s12">
                  <div class="col s5">

                  </div>
                  <div class="col s7">
                      <div class="col s4"><i class="material-icons md-18">thumb_up</i></div>
                      <div class="col s4"><i class="material-icons md-18">thumb_down</i></div>
                      <div class="col s4"><i class="material-icons md-18">repeat</i></div>
                  </div>

              </div>
          </div>
    </div>
@endforeach
