
<div class="card-title">
    Education
</div>
<div class="divider"></div>
<div class="col s12">
    <div class="font-pattern1">
      @foreach ($profile['schools'] as $school)
        <div>Schooled at {{ $school->name }} <small><li>{{(new \Carbon\Carbon($school->pivot->admission))->year.'  -  '.(new \Carbon\Carbon($school->pivot->graduation))->year}}</li></small></div>
        <div class="divider"></div>
      @endforeach
    </div>
</div>
