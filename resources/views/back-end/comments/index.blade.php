<table class="table" >
    <tbody>
        @foreach ($comments as $x => $comment)
            <tr>
                <td>{{ $x + 1 }}</td>
                <td>
                    <p>{{ $comment->comment }}</p>
                    <p>{{ $comment->user->name }}</p>
                    <small>{{ $comment->created_at }}</small><br>
                </td>
                <td class="td-actions text-right">
                    {{-- @include('back-end.shared.buttons.edit', [
                        'routeName' => 'comments',
                        'ModelName' => 'Comment',
                        ]) --}}
                        <button type="button"  rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()" class="btn btn-white btn-link btn-sm"
                            data-original-title="Edit Comment">
                            <i class="material-icons">edit</i>
                        </button>
                        <a type="button" href="{{route('comments.delete',$comment->id)}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                            data-original-title="Delete Comment">
                            <i class="material-icons">close</i>
                        </a>
                </td>
            </tr>
            <tr style="display: none">
                <td colspan="4">
                    <form action="{{route('comments.update',$comment->id)}}" method="post">
                        @csrf
                        <label class="bmd-label-floating">Edit Comment </label>
                        <textarea name="comment" cols="30" rows="5" class="form-control"></textarea>
                        <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        <button type="submit" class="btn btn-primary pull-right">{{ 'Submit'}}</button>
    
                    </form>

                </td>
       
            </tr>
        @endforeach
    </tbody>
</table>
