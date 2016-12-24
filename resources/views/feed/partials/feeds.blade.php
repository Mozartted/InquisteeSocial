@if(!empty($status))
    @foreach($status as $stat)
        @if(($commendLeaders=$commends->where('status_id',$stat->id))->count()>0)

          <div class="card sections min-margin feed-object" id="feed{!! $stat->id !!}" style="margin-top: 10px">
            <div class="content" style="padding:5px;">
              <small>
              @foreach($commendLeaders as $commender)
                <a href="{{ url($commender->user->username) }}">
                {{ $commender->user->username.',' }}
              </a>
              @endforeach

              commended this post
            </small>
            </div>
            @if(!empty(($stat->commends->whereIn('user_id',Auth::user()->leaders->pluck('id'))->first())->commend ))
              <div class="content" style="padding:5px;">
                <p class="status-text" style="color:#757575;">
                  {{ ($stat->commends->whereIn('user_id',Auth::user()->leaders->pluck('id'))->first())->commend}}
                </p>
              </div>
            @endif
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
                    @if (isset($stat->owner->profile->profileMedia->url))
                      <img src="{{$stat->owner->profile->profileMedia->url}}" class="feed-img-status circle">
                    @else
                      <img src="images/profileimages/icon-user-default.png" class="feed-img-status circle">
                    @endif
                  </div>
                  <div class="col s10">
                    <p class="username-text" style="color:#757575;">{{$stat->owner->profile->first_name.' '.$stat->owner->profile->last_name}} </p>
                      <small><a href="{{ url($stat->owner->username) }}">{{$stat->owner->username}}</a></small>
                      <small>{{$stat->created_at->diffForHumans()}}</small>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <div class="col s12">
                  <div class="col s5">
                  </div>
                  <div class="col s7">
                    @if ($stat->loves->count()>0)
                      <span id="{{ 'statCount'.$stat->id }}">{{ $stat->loves->count() }}</span>
                      <!--Like-->
                    @else
                      <span id="{{ 'statCount'.$stat->id }}"></span>
                      <!--Like-->
                    @endif
                    @if((Auth::user()->loves->where('status_id',$stat->id))->count()>0)
                      <div class="col s4 votedown love" data-stat-id="{{ $stat->id }}" data-status="true"><i class="material-icons md-18">thumb_up</i></div>
                    @else
                      <div class="col s4 votedown love" data-stat-id="{{ $stat->id }}" data-status="false"><i class="material-icons md-18">thumb_up</i></div>
                    @endif


                        @if((Auth::user()->commends->where('status_id',$stat->id))->count()>0)

                          <div class="col s4 commend" data-target="commend-section" data-id="{{ $stat->id }}" data-status="true"><i class="material-icons md-18">repeat</i></div>
                        @else
                          <div class="col s4 commend" data-target="commend-section" data-id="{{ $stat->id }}" data-status="false"><i class="material-icons md-18">repeat</i></div>
                        @endif
                  </div>

              </div>
            </div>
        </div>

        @else
          <div class="card sections min-margin feed-object" id="feed{!! $stat->id !!}" style="margin-top: 10px">
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
                          @if (isset($stat->owner->profile->profileMedia->url))
                              <img src="{{$stat->owner->profile->profileMedia->url}}" class="feed-img-status circle">
                          @else
                              <img src="images/profileimages/icon-user-default.png" class="feed-img-status circle">
                          @endif

                      </div>
                      <div class="col s10">
                          <p class="username-text" style="color:#757575;">{{$stat->owner->profile->first_name.' '.$stat->owner->profile->last_name}} </p>
                          <small><a href="{{ url($stat->owner->username) }}">{{$stat->owner->username}}</a></small>
                          <small>{{$stat->created_at->diffForHumans()}}</small>
                      </div>
                  </div>
              </div>
              <div class="card-action">
                  <div class="col s12">
                      <div class="col s5">

                      </div>
                      <div class="col s7">
                        @if ($stat->loves->count()>0)
                          <span id="{{ 'statCount'.$stat->id }}">{{ $stat->loves->count() }}</span>
                          <!--Like-->
                        @else
                          <span id="{{ 'statCount'.$stat->id }}"></span>
                          <!--Like-->
                        @endif
                        @if((Auth::user()->loves->where('status_id',$stat->id))->count()>0)
                          <div class="col s4 votedown love" data-stat-id="{{ $stat->id }}" data-status="true"><i class="material-icons md-18">thumb_up</i></div>
                        @else
                          <div class="col s4 votedown love" data-stat-id="{{ $stat->id }}" data-status="false"><i class="material-icons md-18">thumb_up</i></div>
                        @endif

                          @if((Auth::user()->commends->where('status_id',$stat->id))->count()>0)
                            <div class="col s4 commend" data-target="commend-section" data-id="{{ $stat->id }}" data-status="true"><i class="material-icons md-18">repeat</i></div>
                          @else
                            <div class="col s4 commend" data-target="commend-section" data-id="{{ $stat->id }}" data-status="false"><i class="material-icons md-18">repeat</i></div>
                          @endif

                      </div>

                  </div>
              </div>
          </div>

        @endif


    @endforeach
@endif
