
<form action="{{ route($routeName.'.destroy', $row)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" href="{{ route($routeName.'.destroy', $row) }}" rel="tooltip"
        title="" class="btn btn-white btn-link btn-sm"
        data-original-title="Remove {{ $ModelName }}">
        <i class="material-icons">close</i>
    </button>
</form>