<form action="{{ route('front.commentsStore') }}" method="post">
    @csrf
    <label class="bmd-label-floating">Add Comment </label>
    <input type="hidden" value="{{ $video->id }}" name="video_id">
    <textarea name="comment" cols="50" rows="5" class="form-control"></textarea>
    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
    <button type="submit" class="btn btn-secondary pull-right">{{ 'Add Comment' }}</button>

</form>