<?php
namespace App\Actions;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class CRUDAction extends Action {
    /**
     * @var callable a PHP callable that will be called when running an action to determine
     * if the current user has the permission to execute the action. If not set, the access
     * check will not be performed. The signature of the callable should be as follows,
     *
     * ```php
     * function ($model = null) {
     *     // $model is the requested model instance.
     *     // If null, it means no specific model (e.g. IndexAction)
     * }
     * ```
     *
     * If callable return false then perform standard access control filter behavior
     * (like in [[\yii\filters\AccessControl]]).
     */
    public $checkAccess;

    public $attributes = [];

    public $handler;

    public $modal = [
        'title' => ''
    ];

    /**
     * Finding model by primary key.
     * @param      $condition
     * @param bool $throwException
     * @return mixed
     */

    public function findModel($condition, $throwException = true)
    {
        $model = call_user_func([$this->modelClass, 'findOrFail'], $condition);

        if (!$model && $throwException) {
            throw (new ModelNotFoundException)->setModel($this->modelClass, $condition);
        }

        return $model;
    }


}