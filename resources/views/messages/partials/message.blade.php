@foreach ($messages as $message)
  <li>
      <div class="message">
        <!--Firstcheck if message is from user it another person-->
        @if ($message->sender==Auth::user()->id)
          <span class="message-head">You Sent <small> {{ $message->created_at->diffForHumans() }}</small></span>
        @else
          <span class="message-head">{{ $message->sender }} <small> {{ $message->created_at->diffForHumans() }}</small></span>
        @endif
          <p>A new Idea behind coding works</p>
      </div>
   </li>
  <div class="divider"></div>
@endforeach
