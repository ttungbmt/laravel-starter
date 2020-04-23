<div>
    <div>
        <input type="text" wire:model="name">
        {{$name}}
    </div>

    <table class="table table-bordered">
        <tr>
            <td>#</td>
            <td>Tên</td>
        </tr>

        @foreach($data as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td width="100">
                    <button wire:click="save" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">Del</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
