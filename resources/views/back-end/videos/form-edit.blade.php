<form action="{{ route($routeName . '.update', $row->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            @php
                $input = 'name';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Video Name</label>
                <input type="text" class="form-control" name="{{ $input }}" autocomplete="off"
                    value="{{ $row->$input }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
        <div class="col-md-6">
            @php
                $input = 'meta-keywords';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Meta_Keywords</label>
                <input type="text" class="form-control" name="{{ $input }}" autocomplete="off"
                    value="{{ $row->$input }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
        <div class="col-md-6">
            @php
                $input = 'youtube';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Youtube Url</label>
                <input type="url" class="form-control" name="{{ $input }}" autocomplete="off"
                    value="{{ $row->$input }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
        <div class="col-md-6">
            @php $input = "published"; @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Video Status</label>
                <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                    <option value="1"{{ $row->published == 1 ? 'selected' : '' }}>Published</option>
                    <option value="0"{{ $row->published == 0 ? 'selected' : '' }}>Hidden</option>
                </select>
                @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            @php
                $input = 'category_id';
            @endphp
            <div class="form-group bmd-form-group">
                <label for="select menu" class="bmd-label-floating">Video Category</label>
                <select name="{{ $input }}" class="form-control" id="select menu">
                    @foreach ($categories as $cat)
                        {{-- <option value="{{ $cat->id }}"{{ $row->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}</option> --}}
                        {{-- Another Condition --}}
                        @if ($row->category_id == $cat->id)
                            <option value="{{ $cat->id }}" selected> {{ $cat->name }}</option>
                        @else
                            <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                        @endif
                        {{-- End Another Condition --}}
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
        <div class="col-md-6">
            @php
                $input = 'image';
            @endphp
            <div class="form-group bmd-form-group">
                <label for="select menu" class="bmd-label-floating">Video Image</label>
                <input type="text" class="form-control" name="{{ $input }}" autocomplete="off">
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

        <div class="col-md-5">
            @php
                $input = 'meta-description';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Meta-Description </label>
                <textarea name="{{ $input }}" cols="30" rows="5" class="form-control"></textarea>
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>

        @php
            $input = 'skills[]';
        @endphp
        <div class="form-group bmd-form-group">
            <label for="select menu" class="bmd-label-floating">Video Skills</label>
            <select multiple name="{{ $input }}" class="form-control" id="select menu" style="height: 100px">
                @foreach ($skills as $skill)
                    <option
                        value="{{ $skill->id }}"{{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                        {{ $skill->name }}</option>
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
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                        {{ $tag->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>

    </div>

    <button type="submit" class="btn btn-primary pull-right">Update {{ $PageTitle }}</button>
    <div class="clearfix"></div>
</form>
