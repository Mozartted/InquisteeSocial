@if(isset($followers) && $followers->total() > 0)
  @foreach($followers as $follower)
    <div class="col s4 m6">
      <div class="card sections">
        <div class="card-image">
          <img src="{{ asset($follower->profile->profileMedia->url) }}" style="object-fit: cover;">
          <span class="card-title">{{ $follower->profile->first_name.' '.$follower->profile->last_name }}</span>
        </div>
        <div class="card-content">
          <small>{{'@'.$follower->username}}</small>
        </div>
        <div class="card-action">
          <a href="#" class="waves-effect waves-light btn">Follow</a>
          <a href="#" class="waves-effect waves-light btn">interested</a>
        </div>
      </div>
    </div>
  @endforeach

@else
  <div class="col s12">
    <p>{{$profile['firstname'].' '.$profile['lastname']}} has no followers</p>
  </div>
@endif
