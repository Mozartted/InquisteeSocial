@foreach ($messages as $message)
  <li>
      <div class="message">
        <!--Firstcheck if message is from user it another person-->
        @if ($message->sender==Auth::user()->id)
          <span>You Sent <small> {{ $message->created_at->diffForHumans() }}</small></span>
        @else
          <span class="message-head">{{
             (\App\Models\Message::where('id',$message->id)->first())->sending->username }} <small> {{ $message->created_at->diffForHumans() }}</small></span>
        @endif
          <span class="message-head">{{ $message->message }}</span>
      </div>
   </li>
  <div class="divider"></div>
@endforeach
