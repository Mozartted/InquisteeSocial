<div class="card sections">
    {!! Form::open(['route'=>'feeds_path','files' => 'true']) !!}
    <div class="col s12">
      <div class="input-field">
          <textarea name="status_text" class="materialize-textarea" id="postStatus" length="140" ></textarea>
            <label for="postStatus">What's on your mind ?</label>
      </div>
    </div>
    <div class="divider"></div>
    <div class="col s12">
        {!! Form::file('image') !!}
    </div>
    <div class="divider"></div>
    <div class="col s12">
        <button class="waves-effect waves-light btn red" type="submit">Publish</button>
    </div>
    {!! Form::close() !!}
</div>
