@csrf
<div class="row">
    <div class="col-md-6">
        @php
            $input = 'name';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" class="form-control" name="{{ $input }}" class="form-control " autocomplete="off">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />

        </div>
    </div>
    <div class="col-md-6">
        @php
            $input = 'meta_keywords';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta_Keywords</label>
            <input type="text" class="form-control" name="{{ $input }}" autocomplete="off">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-6">
        @php
            $input = 'youtube';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube Url</label>
            <input type="url" class="form-control" name="{{ $input }}" autocomplete="off">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-6">
        @php $input = "published"; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{ $input }}" class="form-control">
                <option disabled selected>Choose Status</option>
                <option value="1">published</option>
                <option value="0">hidden</option>
            </select>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-6">
        @php
            $input = 'category_id';
        @endphp
        <div class="form-group bmd-form-group">
            <div class="form-group">
                <label for="select menu">Video Category</label>
                <select class="form-control" id="select menu" name="{{ $input }}" style="height: 100px">
                    <option selected disabled>Choose Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>

        </div>
    </div>

    <div class="col-md-5">
        @php
            $input = 'meta_description';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta-Description </label>
            <textarea name="{{ $input }}" cols="30" rows="5" class="form-control"></textarea>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>

    <div class="col-md-6">
        @php
            $input = 'skills[]';
        @endphp
        <div class="form-group bmd-form-group">
            <label for="select menu" class="bmd-label-floating">Video Skills</label>
            <select multiple name="{{ $input }}" class="form-control" id="select menu" style="height: 100px">
                <option selected disabled value="">Choose</option>
                @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-6">
        @php
            $input = 'tags[]';
        @endphp
        <div class="form-group bmd-form-group">
            <label for="select menu" class="bmd-label-floating">Video Tags</label>
            <select multiple name="{{ $input }}" class="form-control" id="select menu" style="height: 100px">
                <option selected disabled value="">Choose</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-12">
        @php
            $input = 'description';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Description</label>
            <textarea name="{{ $input }}" cols="30" rows="5" class="form-control"></textarea>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>

    <div class="input-group mb-3">
        @php
            $input = 'image';
        @endphp
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="{{$input}}">
        <x-input-error :messages="$errors->get($input)" class="mt-2" />
    </div>

</div>
