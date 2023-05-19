@csrf
<div class="row">
    @php
    $input = 'name';
@endphp
    <div class="col-md-6">

        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" class="form-control" name="{{ $input }}" autocomplete="off">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>

    <div class="col-md-6">
        @php
            $input = 'email';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="email" class="form-control" name="{{ $input }}" autocomplete="off">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-6">
        @php $input = "group"; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">User group</label>
            <select name="{{ $input }}" class="form-control">
                <option disabled selected>Choose group</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
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
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Confirm Password </label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
    </div>
</div>
