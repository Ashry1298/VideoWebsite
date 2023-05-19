<div class="row">
    @php
        $input = 'name';
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating"> Name</label>
            <input type="text" class="form-control" name="{{ $input }}" autocomplete="off"
                value="{{ old($input) ? old($input) : $row->name }}">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>

    <div class="col-md-6">
        @php
            $input = 'email';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="text" class="form-control" name="{{ $input }}" autocomplete="off"
                value="{{ old($input) ? old($input) : $row->email }}">
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-12">
        @php
            $input = 'message';
        @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{ $input }}" cols="30" rows="5" class="form-control">{{ $row->message }}</textarea>
            <x-input-error :messages="$errors->get($input)" class="mt-2" />
        </div>
    </div>
    <div class="col-md-12">
        <form action="{{route('message.reply')}}" method="post">
            @csrf
            @php $input = "reply"; @endphp
            <div class="col-md-12">
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Reply Message</label>
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <textarea name="{{ $input }}" cols="30" rows="5"
                        class="form-control @error($input) is-invalid @enderror"></textarea>
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Replay Message</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
