<form action="{{ route($routeName . '.update', $row->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        @php
            $input = 'name';
        @endphp
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Username</label>
                <input type="text" class="form-control" name="{{ $input }}" autocomplete="off"
                    value="{{ old($input) ? old($input) : $row->name }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary pull-right">Update {{ $PageTitle }}</button>
    <div class="clearfix"></div>
</form>
