@if (isset($MessageCollection))
    @foreach ($MessageCollection as $collected)
      @if ($recentUser==$collected['responder']->id )
        <div class="collection-item avatar active" data-tab="tab-{{ $collected['responder']->id }}">
      @elseif($resentUser==$collected['responder']->id)
        <div class="collection-item avatar active" data-tab="tab-{{ $collected['responder']->id }}">
      @else
        <div class="collection-item avatar" data-tab="tab-{{ $collected['responder']->id }}">
      @endif

          @if(isset($collected['responder']->profile->profileMedia->url))
            <img src="{{ $collected['responder']->profile->profileMedia->url }}" alt="" class="circle">
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
