<div class="card-header blue darken-3 white-text padding-5">
    <div class="card-title"><span>Photos</span></div>
</div>
<div class="card-content">
    <div>
        <div class="pics">
            @if(isset($profile['pictures']))
                @foreach($profile['pictures'] as $pics)
                    <div class="photo">
                        <img src="{{$pics->url}}" class="photo-thumbs" style="object-fit:cover"/>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
