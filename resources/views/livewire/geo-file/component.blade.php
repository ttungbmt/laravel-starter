<div>

    @if($view === 'index')
        <div class="d-flex justify-between">
            <div>

            </div>
            <div class="form-group">
                <button wire:click="handleCreate" class="btn btn-primary">{{__('Create')}}</button>
            </div>
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
                            <button class="btn btn-xs btn-danger" onclick="confirmDelete({{$row->id}})">{{__('Delete')}}</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}

    @elseif($view !== 'index')
        @include('livewire.geo-file.form')
    @endif

    @include('components.confirm-delete')
</div>

