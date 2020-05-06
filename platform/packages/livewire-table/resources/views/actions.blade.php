<div>
    <div class="btn-group">
        <a href="{{route('geo-file.edit', ['geo_file' => $model->id])}}" class="btn btn-xs btn-primary" title="{{__('Edit')}}"><i class="icon-pencil7"></i></a>
        <button wire:click="handleEdit({{$model->id}})" class="btn btn-xs btn-warning" title="{{__('Edit')}}"><i class="icon-pencil7"></i></button>
        <button class="btn btn-xs btn-danger" onclick="confirmDelete({{$model->id}})" title="{{__('Delete')}}"><i class="icon-bin"></i></button>
    </div>
</div>

