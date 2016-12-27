<div class="card sections" style="overflow:hidden">
    <div class="card-content">
        <div class="col s12 center-align">
            @if(empty(Auth::user()->profile->profileMedia->url))
                <img src="images/profileimages/icon-user-default.png" class="feed-img responsive-img circle">
            @else
                <img src="{{asset(Auth::user()->profile->profileMedia->url)}}" class="feed-img responsive-img circle">
            @endif
        </div>
        <div class="col s12 center-align">
            <a href="{{url('/'.Auth::user()->username)}}"><span class=""><small>@ {!! Auth::user()->username !!}</small></span></a>

            <span class=""><h6>{!! Auth::user()->profile->first_name !!} {!! Auth::user()->profile->last_name !!}</h6></span>
        </div>
    </div>
</div>
<div>
    <ul class="collapsible " data-collapsible="accordion">        
        <li>
            <div class="collapsible-header truncate">
                <span class="new badge">{{ Auth::user()->followers->count() }}</span>Following You
            </div>
            <div class="collapsible-body">
                <div class="collection">
                    @if (isset(Auth::user()->followers))
                      @foreach (Auth::user()->followers as $follower)
                        <div class="collection-item avatar">
                          @if (isset($follower->profile->profileMedia->url))
                            <img src="{{$follower->profile->profileMedia->url}}" class="circle">
                          @else
                            <img src="images/profileimages/icon-user-default.png" class="circle">
                          @endif
                            <a href="{{ url($follower->username) }}"><span>@ {{ $follower->username }}</span></a> Followed You
                        </div>
                      @endforeach
                    @endif

                </div>
            </div>
        </li>
    </ul>
</div>
