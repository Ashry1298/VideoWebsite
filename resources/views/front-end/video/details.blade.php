<div class="col-md-6">
    <p>
        <span style="margin-right: 20px">
            <i class="nc-icon nc-single-02"> {{ $video->user->name }} </i>
        </span>
    </p>
    <p>
        <span style="margin-right: 20px">
            <i class="nc-icon nc-calendar-60"> {{ $video->created_at }} </i>
        </span>
    </p>
    <p>
        <span style="margin-right: 20px">
            <a href="{{ route('front.categories', $video->category_id) }}">
                <i class="nc-icon nc-paper"> {{ $video->category->name }} </i>
            </a>
        </span>

    </p>

    @if (!empty($video->tags))
        <h6>Tags :</h6>
        <p>
            @foreach ($video->tags as $tag)
                <a href="{{ route('front.tags', $tag->id) }}"><span
                        class="badge badge-info">{{ $tag->name }}</span></a>
            @endforeach
        </p>
    @endif
    @if (!empty($video->skills))
        <h6>Skills :</h6>
        <p>
            @foreach ($video->skills as $skill)
                <a href="{{ route('front.skills', $skill->id) }}"> <span
                        class="badge badge-success">{{ $skill->name }}</span></a>
            @endforeach
        </p>
    @endif



</div>
