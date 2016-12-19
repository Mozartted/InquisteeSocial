<div class="card-title">
    Overview
</div>
<div class="divider"></div>
<div class="col s12 m7">
    <div class="col s12"><span>{{ $profile['about'] }}</span></div>
</div>
<div class="col s12 m5">
    <div class="font-pattern2 red-text">
        <div>08117396256</div>
        <div class="divider"></div>
        @if (isset($profile['email']))
          <div>{{ $profile['email'] }}</div>
          <div class="divider"></div>
        @endif
        @if (isset($profile['birthday']))
          <div>{{(new \Carbon\Carbon($profile['birthday']))->format('d F Y')}}</div>
          <div class="divider"></div>
        @endif

    </div>
</div>
