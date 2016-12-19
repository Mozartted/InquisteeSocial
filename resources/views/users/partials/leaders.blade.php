@if(isset($following) && $following->total() > 0)
  @foreach($following as $leader)
    <div class="following-div">
      <div class="card horizontal sections">
        <div class="card-image">
          @if (isset($leader->profile->profileMedia->url))
            <img src="{{ asset($leader->profile->profileMedia->url) }}" style="object-fit: cover;">
          @else
            <img src="images/profileimages/icon-user-default.png" style="object-fit: cover;">
          @endif
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <span>{{ $leader->profile->first_name.' '.$leader->profile->last_name }}</span>
            <small>{{'@'.$leader->username}}</small>
          </div>
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
    <p>{{$profile['firstname'].' '.$profile['lastname']}} is not following anybody, he's a boss</p>
  </div>
@endif
