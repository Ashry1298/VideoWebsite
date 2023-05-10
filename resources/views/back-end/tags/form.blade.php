@csrf
<div class="row">
    @php
    $input = 'name';
@endphp
    <div class="col-md-6">

        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tag Name</label>
            <input type="text" class="form-control" name="{{ $input }}" autocomplete="off">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
</div>
