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
                    value="{{ old('name') ? old('name') : $row->name }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
        <div class="col-md-6">
            @php
                $input = 'email';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Email</label>
                <input type="email" class="form-control" name="{{ $input }}" autocomplete="off"
                    value="{{ old('email') ? old('email') : $row->email }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
        <div class="col-md-6">
            @php
                $input = 'password';
            @endphp
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Password </label>
                <input type="password" class="form-control" name="{{ $input }}">
                <x-input-error :messages="$errors->get($input)" class="mt-2" />
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Update {{ $PageTitle }}</button>
    <div class="clearfix"></div>
</form>
