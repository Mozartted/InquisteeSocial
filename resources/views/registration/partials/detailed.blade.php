
<div class="col s12">
  <div class="input-field">
      <label for="description">
          Describ Yourself, There's enough time
      </label>
      <textarea name="about" id="description" class="materialize-textarea"></textarea>
  </div>
</div>

<div class="col s12">
  <div class="input-field">
      <label for="place">
          Which school are you from, Don't lie !!
      </label>
      <textarea name="location" id="place" class="materialize-textarea"></textarea>
  </div>
</div>
<div class="col s12">
  <div class="col s12"><span>Enter Admission Date</span></div>
<div class="col s3">
<div class="input-field">
  {!! Form::select('adMonth', [
            '01' => '1',
            '02' => '2',
            '03' => '3',
            '04' => '4',
            '05' => '5',
            '06' => '6',
            '07' => '7',
            '08' => '8',
            '09' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',

       ], 01, ['id' => 'admonth', 'class'=>'browser-default']) !!}
       <label for="admonth"></label>


</div>
</div>
<div class="col s3">
<div class="input-field">

      {!! Form::select('adDay', [
                '01' => '1',
                '02' => '2',
                '03' => '3',
                '04' => '4',
                '05' => '5',
                '06' => '6',
                '07' => '7',
                '08' => '8',
                '09' => '9',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20',
                '21' => '21',
                '22' => '22',
                '23' => '23',
                '24' => '24',
                '25' => '25',
                '26' => '26',
                '27' => '27',
                '28' => '28',
                '29' => '29',
                '30' => '30',
                '31' => '31'
           ], 01, ['id' => 'adday', 'class'=>'browser-default']) !!}
           <label for="adday"></label>

</div>
</div>
<div class="col s4">
  <div class="input-field">
    {!!Form::label('year', null, ['class' => '','for'=>'adyear'])!!}
      {!!Form::text('year', null, ['class' => '','id'=>'adyear'])!!}
      </div>
</div>

</div>

<div class="col s12">
  <div class="col s12"><span>Enter Graduation Date</span></div>
<div class="col s3">
<div class="input-field">
  {!! Form::select('gdMonth', [
            '01' => '1',
            '02' => '2',
            '03' => '3',
            '04' => '4',
            '05' => '5',
            '06' => '6',
            '07' => '7',
            '08' => '8',
            '09' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',

       ], 01, ['id' => 'gdmonth', 'class'=>'browser-default']) !!}
       <label for="gdmonth"></label>


</div>
</div>
<div class="col s3">
<div class="input-field">

      {!! Form::select('gdDay', [
                '01' => '1',
                '02' => '2',
                '03' => '3',
                '04' => '4',
                '05' => '5',
                '06' => '6',
                '07' => '7',
                '08' => '8',
                '09' => '9',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20',
                '21' => '21',
                '22' => '22',
                '23' => '23',
                '24' => '24',
                '25' => '25',
                '26' => '26',
                '27' => '27',
                '28' => '28',
                '29' => '29',
                '30' => '30',
                '31' => '31'
           ], 01, ['id' => 'gdday', 'class'=>'browser-default']) !!}
           <label for="gdday"></label>

</div>
</div>
<div class="col s4">
  <div class="input-field">
    {!!Form::label('gdYear', null, ['class' => '','for'=>'gdyear'])!!}
      {!!Form::text('gdYear', null, ['class' => '','id'=>'gdyear'])!!}
      </div>
</div>

</div>

<div class="col s12">
  <div class="input-field">
      <button class="waves-effect waves-light btn" id="upload_details">Upload Description</button>
  </div>

</div>
