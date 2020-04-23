<div>
    @if($view === 'index')
        <div class="form-group">
            <button wire:click="handleCreate" class="btn btn-primary">{{__('Create')}}</button>
        </div>

        <table class="table table-bordered">
            <tr>
                <td>#</td>
                <td>Tên</td>
                <td>{{__('Action')}}</td>
            </tr>

            @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>
                        <div class="btn-group">
                            <button wire:click="handleEdit({{$row->id}})" class="btn btn-xs btn-warning">{{__('Edit')}}</button>
                            <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">{{__('Delete')}}</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}

    @elseif($view !== 'index')
        @include('livewire.geo-file.form')
    @endif
</div>
