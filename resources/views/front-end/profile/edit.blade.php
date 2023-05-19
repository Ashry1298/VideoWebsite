<div class="card text-left" id="profileCard" style="margin-top: 20px;display: none">
    <div class="card-header">
        <h4 style="margin-top: 10px;margin-bottom: 5px">Update Profile</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('profile.userUpdate') }}" method="post">
            <div class="row">
                @csrf
                @php $input = "name"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name="{{ $input }}"
                            value="{{ isset($user) ? $user->{$input} : '' }}"
                            class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @php $input = "email"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" name="{{ $input }}"
                            value="{{ isset($user) ? $user->{$input} : '' }}"
                            class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @php $input = "password"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="{{ $input }}"
                            class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    @php
                        $input = 'aboutMe';
                    @endphp
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">aboutMe</label>
                        <textarea name="{{ $input }}" cols="30" rows="5" class="form-control">{{$user->aboutMe}}</textarea>
                        <x-input-error :messages="$errors->get($input)" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit" style="margin-top: 30px" class="btn btn-info btn-sm btn-round">Update
                        profile</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>
