<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Recent Comments</h4>
                <p class="card-category">Here You Can see the recent comments</p>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Video</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Processing</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $x => $comment)
                            <tr>
                                <td>{{ $x + 1 }}</td>
                                <td>{{ $comment->id }}</td>
                                <td><a
                                        href="{{ route('users.edit', $comment->user->id) }}">{{ $comment->user->name }}</a>
                                </td>
                                <td><a
                                        href="{{ route('videos.edit', $comment->video->id) }}">{{ $comment->video->name }}</a>
                                </td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" onclick="$('#editcomment').slideToggle(1000)"
                                        class="btn btn-white btn-link btn-sm" data-original-title="Edit Task">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    @include('back-end.home-sections.comment-edit')
                                    <a type="button" rel="tooltip" title=""
                                        href="{{ route('comments.delete', $comment->id) }}"
                                        class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                                        <i class="material-icons">close</i>
                                        <form action="{{ route('comments.delete', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $comments->render() }}
            </div>
        </div>
    </div>

</div>
