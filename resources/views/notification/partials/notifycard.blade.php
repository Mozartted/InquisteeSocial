@foreach ($variable as $key => $value)
    <div class="card-content sections">
        <div class="col s12">
            <div class="col s12">
                <div class="col s12">
                    <a>
                        <span class="red-text" >
                            <b>@Mozartted </b>
                        </span>

                        <p><span class="color-span red-text">You have 14 new Followers</span></p>

                    </a>

                </div>
                <div class="col s12 images">
                    <div>
                        <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                    </div>
                    <div>
                        <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                    </div>
                    <div>
                        <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="divider"></div>
@endforeach
