@if(isset($followers) && $followers->total() > 0)
  @foreach($followers as $follower)
    <div class="following-div">
      <div class="card horizontal sections">
        <div class="card-image">
          @if (isset($follower->profile->profileMedia->url))
            <img src="{{ asset($follower->profile->profileMedia->url) }}" style="object-fit: cover;">
          @else
            <img src="images/profileimages/icon-user-default.png" style="object-fit: cover;">
          @endif
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <span>{{ $follower->profile->first_name.' '.$follower->profile->last_name }}</span>
            <small>{{'@'.$follower->username}}</small>
          </div>
        </div>

        <div class="card-action">
          <a href="#" class="waves-effect waves-light btn-flat">Follow</a>
          <a href="#" class="waves-effect waves-light btn-flat">interested</a>
        </div>
      </div>
    </div>
  @endforeach

@else
  <div class="col s12">
    <p>{{$profile['firstname'].' '.$profile['lastname']}} has no followers</p>
  </div>
@endif
