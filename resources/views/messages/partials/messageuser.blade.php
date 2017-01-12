<!--In here the idea is to have the messages outline into tabbed bosxes for each user-->
@if (isset($MessageCollection))
  @foreach ($MessageCollection as $key)
    @if ($recentUser==$key['responder']->id)
      <div class="tab-content active" id="tab-{{ $key['responder']->id }}" style="overflow-y:scroll">
    @elseif($resentUser==$key['responder']->id)
      <div class="tab-content active" id="tab-{{ $key['responder']->id }}" style="overflow-y:scroll">
    @else
      <div class="tab-content" id="tab-{{ $key['responder']->id }}" style="overflow-y:scroll">
    @endif

        <div class="card-content sections">
            <div>
                <ul class="user-message">
                    @include('messages.partials.message',['messages'=>$key['messages']])
                </ul>
             </div>
        </div>
    </div>
  @endforeach
@endif
