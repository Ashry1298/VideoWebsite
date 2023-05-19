<div class="card text-left" id="editcomment" style="margin-top: 20px;display: none">
    <div class="card-header">
        <h4 style="margin-top: 10px;margin-bottom: 5px">Update Comment</h4>
    </div>
    <div class="card-body">
        <form action="{{route('front.commentsUpdate',$comment->id)}}" method="post">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    @php
                        $input = 'comment';
                    @endphp
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Comment</label>
                        <textarea name="{{ $input }}" cols="30" rows="5" class="form-control"></textarea>
                        <x-input-error :messages="$errors->get($input)" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="id" value="">
                    <button type="submit" style="margin-top: 30px" class="btn btn-info btn-sm btn-round">Update
                        Comment</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>
