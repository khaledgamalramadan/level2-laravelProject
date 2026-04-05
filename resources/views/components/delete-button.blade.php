<form action="{{ $href }}" method="post" class="d-inline"
    id="deleteForm-{{ $id }}">
    @method('DELETE')
    @csrf
    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $id }})">
        <i class="fe fe-trash-2 fa-2x"></i>
    </button>
</form>
