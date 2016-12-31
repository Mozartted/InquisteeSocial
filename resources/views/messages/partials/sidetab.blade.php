@if (isset($MessageCollection))
    @foreach ($MessageCollection as $collected)
      <div class="collection-item avatar" data-tab="tab-{{ $collected->responder->id }}">
          @if(isset($collected->responder->profile->profileMedia->url))
            <img src="{{ $collected->responder->profile->profileMedia->url }}" alt="" class="circle">
          @else
            <img src="images/profileimages/icon-user-default.png" alt="" class="circle">
          @endif

          <span class="title">{{$collected->responder->username }}</span>
      </div>
    @endforeach

@else
  <div class="collection-item">
      <span class="title">You are currently chatting with no one</span>
  </div>
@endif
