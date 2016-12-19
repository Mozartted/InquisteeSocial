<div class="card sections top-card-border-red">
    <div class="card-title" style="padding:12px;">
        <span style="font-weight: light">Intro</span>
    </div>
    <div class="card-content">
        <div class="col s12 story">
          @if (isset($profile['about']))
            <div class="font-pattern2">{{ $profile['about'] }}</div>
          @endif
        </div>
        <div class="col s12 story">
            <div>
                <div class="bold-text">Education</div>
                <ul class="font-pattern2">
                  @foreach ($profile['schools'] as $school)
                    <li>{{ $school->name.' '.(new \Carbon\Carbon($school->pivot->admission))->year.'  -  '.(new \Carbon\Carbon($school->pivot->graduation))->year}}</li>
                  @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
