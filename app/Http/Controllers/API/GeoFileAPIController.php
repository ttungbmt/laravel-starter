<?php
namespace App\Http\Controllers\API;

use App\GeoDrive;
use App\GeoFileManager;
use App\Http\Controllers\Controller;

class GeoFileAPIController extends Controller {
    public function index($id = null) {
        if ($id) return GeoDrive::find($id);

        return GeoDrive::all();
    }

    public function files($id) {
//        GeoFileManager::fixTree();
        $flatOrNested = request()->get('nested', false) ? 'toTree' : 'toFlatTree';
        $drive = GeoDrive::findOrFail($id);
        $rootId = $drive->manager_id;
        $files = GeoFileManager::with(['file'])->descendantsOf($rootId)->$flatOrNested()->toArray();
        $filesInRootIds = GeoFileManager::where(['parent_id' => $rootId])->pluck('id');

        return [
            'drive' => $drive,
            'filesInRootIds' => $filesInRootIds,
            'files' => $files,
        ];
    }
}
