<?php

namespace App\Actions;

use Illuminate\Support\Str;

class Action extends \Lorisleiva\Actions\Action {
    /**
     * Class to use to locate the supplied data ids.
     *
     * @var string
     */
    public $modelClass;
    /**
     * The name of view file.
     *
     * @var string
     */
    public $view = 'default';

    /**
     * The request additional params.
     *
     * @var array
     */
    public $requestParams = [];
    /**
     * The view additional params.
     *
     * @var array
     */
    public $viewParams = [];
    /**
     * The route which will be redirected after the user action.
     *
     * @var string|array|callable
     */
    public $redirectUrl;
    /**
     * The scenario to be assigned to the model before it is validated and updated.
     *
     * @var string
     */
    public $scenario = 'default';
    /**
     * The name of the GET parameter that stores the primary key of the model.
     *
     * @var string
     */
    public $primaryKeyParam = 'id';
    /**
     * Is called when a successful result.
     *
     * @var callable|null;
     */
    public $successCallback;
    /**
     * The flash key for success flash message.
     *
     * @var string
     */
    public $flashSuccessKey = 'success';
    /**
     * Is called when a failed result.
     *
     * @var callable|null;
     */
    public $errorCallback;
    /**
     * The flash key for error flash message.
     *
     * @var string
     */
    public $flashErrorKey = 'error';
    /**
     * This method is called right before `run()` is executed.
     * You may override this method to do preparation work for the action run.
     * If the method returns false, it will cancel the action.
     *
     * @var callable|null
     */
    public $beforeRun;


    /**
     * This method is called right after `run()` is executed.
     * You may override this method to do post-processing work for the action run.
     *
     * @var callable|null
     */
    public $afterRun;
    /**
     * The primary key value of current model.
     *
     * @var int|string|callable|bool
     */
    protected $_primaryKey = false;

    /**
     * Define redirect page after update, create, delete, etc
     *
     * @param string $action
     * @param null   $model
     *
     * @return string|array
     */
    protected function getRedirectPage($action = '', $model = null) {
        $redirectUrl = $this->redirectUrl;
        if (!$redirectUrl) {
            if ($model) {
                $redirectUrl = Str::of(request()->getPathInfo())->match('/(.*)\/[0-9]+$/');
            } else {
                $redirectUrl = request()->getPathInfo();
            }
        }

//        switch ($action) {
//            case 'delete':
//                return ['index'];
//                break;
//            case 'update':
//                return ['view', 'id' => $model->id];
//                break;
//            case 'create':
//                return ['view', 'id' => $model->id];
//                break;
//            default:
//                return ['index'];
//        }

        return $redirectUrl;
    }
}