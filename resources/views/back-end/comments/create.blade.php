<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    @include('back-end.comments.form')

    <button type="submit" class="btn btn-primary pull-right">{{ 'Add Comment' }}</button>
    <div class="clearfix"></div>
</form>
