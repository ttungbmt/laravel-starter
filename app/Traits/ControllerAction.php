<?php
namespace App\Traits;

use App\Actions\CreateAction;
use App\Actions\DestroyAction;
use App\Actions\EditAction;
use App\Actions\IndexAction;
use App\Actions\SaveAction;
use App\Actions\ShowAction;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait ControllerAction {
    /**
     * Class to use to locate the supplied data ids.
     *
     * @var string
     */
    public $modelClass;
    /**
     * Opposite to $disabledActions. Every action from AdminDefaultController except those will be disabled
     *
     * But if action listed both in $disabledActions and $enableOnlyActions
     * then it will be disabled
     *
     * @var array
     */
    public $enableOnlyActions = [];

    protected function getPrefixView(){
        return Str::of(get_class($this))->replace('\\', '/')->match('/.*\/Controllers\/([\w\d\/]+)Controller/')->kebab()->replace('/-', '/');
    }

    public function actions(){
        return [];
    }

    public function defaultActions(){
        return [
            'index'   => IndexAction::class,
            'show'    => ShowAction::class,
            'create'  => CreateAction::class,
            'edit'    => EditAction::class,
            'store'   => SaveAction::class,
            'update'  => SaveAction::class,
            'destroy' => DestroyAction::class,
        ];
    }

    public function callAction($method, $parameters)
    {
        $actions = collect(Arr::isAssoc($this->actions()) ? $this->actions() : array_only($this->defaultActions(), $this->actions()));

        $actions = empty($this->enableOnlyActions) ?  $actions : $actions->only($this->enableOnlyActions);

        if ($actions->has($method)) {
            $action = $actions[$method];

            if(is_string($action)) $action = ['class' => $action, 'modelClass' => $this->modelClass];

            $actionObj = new $action['class'];

            $properties = array_except($action, ['class']);

            if(!isset($properties['view'])){
                $properties['view'] = (string)$this->getPrefixView()->append('.'.$actionObj->view);
            }

            configure($actionObj, $properties);

            return call_user_func_array([$actionObj, 'response'], $parameters);
        }

        return parent::callAction($method, $parameters);
    }
}