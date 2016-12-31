<!--In here the idea is to have the messages outline into tabbed bosxes for each user-->
@if (isset($MessageCollection))
  @foreach ($MessageCollection as $key)
    <div class="tab-content active" id="tab-{{ $key->responder->id }}">
        <div class="card-content sections">
            <div>
                <ul class="user-message">
                    @include('messages.partials.message',
                    ['messages'=>$key->messages])
                </ul>
             </div>
        </div>
    </div>
  @endforeach
@endif
