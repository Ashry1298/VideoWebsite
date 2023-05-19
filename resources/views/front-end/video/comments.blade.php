<div class="row">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header card-header-rose">
                Comments( {{ count($video->comments) }})
            </div>
            @foreach ($video->comments as $comment)
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <i class="nc-icon nc-user-run  "> 
                                <a href="{{route('front.profile',$comment->user->id)}}">
                                    {{ $comment->user->name }}
                                </a>
                              
                            </i>
                        </div>
                        <div class="col-md-4">
                            <i class="nc-icon nc-calendar-60  "> {{ $comment->created_at }} </i>
                            <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                                data-original-title="Remove">
                                <i class="material-icons">Remove </i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p> <i class="nc-icon nc-chat-33"> {{ $comment->comment }} </i></p>
                        @if (Auth::user()->group == 'admin' || $comment->user->name == auth()->user()->name)
                            <button type="button" rel="tooltip" title=""
                                onclick="$(this).next('div').slideToggle(1000);return false"
                                class="btn btn-white btn-link btn-sm" data-original-title="Edit Task">
                                <i class="material-icons">edit</i>
                            </button>
                            <div class="from-group" style="display: none">
                                <form action="{{ route('front.commentsUpdate', $comment->id) }}" method="post">
                                    @csrf
                                    <label class="bmd-label-floating">Edit Comment </label>
                                    <textarea name="comment" cols="50" rows="5" class="form-control">{{ $comment->comment }}</textarea>
                                    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                                    <button type="submit"
                                        class="btn btn-primary pull-right">{{ 'Submit' }}</button>

                                </form>

                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
