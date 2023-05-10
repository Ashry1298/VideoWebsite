<form action="{{ route($routeName . '.update', $row->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        @php
            $input = 'name';
        @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Page Name</label>
                <input type="text" class="form-control" name="{{ $input }}" autocomplete="off"
                    value="{{ old($input) ? old($input) : $row->name }}">
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
                    value="{{ old($input) ? old($input) : $row->email }}">
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

        <div class="col-md-12">
            @php
                $input = 'meta-description';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Meta-Description </label>
                <textarea name="{{ $input }}" cols="30" rows="10" class="form-control"></textarea>
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Update {{ $PageTitle }}</button>
    <div class="clearfix"></div>
</form>
