<div class="card" style="width: 20rem;">
    <a href="{{ route('front-end.video', $video->id) }}" title="{{ $video->name }}">
        <img class="card-img-top" src="{{ url('Upload/Images/' . $video->name . '/' . $video->image) }}"
            style="max-height: 160px">
    </a>
    <div class="card-body">
        <p class="card-text">
            <a href="{{ route('front-end.video', $video->id) }}" title="{{ $video->name }}">
                {{ $video->name }}
            </a>
        </p>
        <small>{{ $video->created_at }}</small>
    </div>
</div>
<br><br>