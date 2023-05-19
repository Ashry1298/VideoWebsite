<div class="col-md-12">
    @php
        $input = 'comment';
    @endphp
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Add New Comment </label>
        <textarea name="{{ $input }}" cols="30" rows="5" class="form-control" ></textarea>
        <input type="hidden" value="{{$row->id}}" name="video_id">
        <x-input-error :messages="$errors->get($input)" class="mt-2" />
    </div>
</div>