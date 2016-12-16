
@if(isset($posts['Status']))
    @foreach($posts['Status'] as $stat)
        <div class="grid-item col s12">
        <div class="card sections min-margin">


            @foreach($stat->media as $media)
                <div class="card-image">
                    <img class="status-img" src="{{asset($media->url)}}">

                </div>
            @endforeach




            <div class="card-content">

                <div class="margin-min-10">
                    <p class="status-text" style="color:#757575;">
                        {{$stat->status_text}}
                    </p>
                </div>

            </div>
            <div class="divider"></div>
            <div class="card-content row" style="padding-left:2px;">
                <div class="col s12 row margin-min-10">
                    <div class="col s2">
                      @if(isset($stat->owner->profile->profileMedia->url))
                        <img src="{{$stat->owner->profile->profileMedia->url}}" class="feed-img-status circle">
                      @endif

                    </div>
                    <div class="col s10">
                        <p class="username-text" style="color:#757575;">{{$stat->owner->profile->first_name.' '.$stat->owner->profile->last_name}} </p>
                        <small>{{$stat->owner->username}}</small>
                        <small>{{$stat->created_at->diffForHumans()}}</small>
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
        </div>
    @endforeach

@endif
