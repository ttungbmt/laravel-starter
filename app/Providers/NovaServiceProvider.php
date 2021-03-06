<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [

            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new \Vink\NovaCacheCard\CacheCard,
//            new Help,
//            new \Marianvlad\NovaEnvCard\NovaEnvCard
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Nibri10\NovaGrid\NovaGrid,
            new \Eminiarts\NovaPermissions\NovaPermissions,
//            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
            new \ttungbmt\SettingTool\SettingTool,
            new \Joedixon\NovaTranslation\NovaTranslation,
            new \Digitalcloud\MultilingualNova\NovaLanguageTool,
            new \Infinety\Filemanager\FilemanagerTool,
            new \OptimistDigital\MenuBuilder\MenuBuilder,
            new \Christophrumpel\NovaNotifications\NovaNotifications,
//            new \Cendekia\SettingTool\SettingTool,
            new \CharlieLangridge\CompileAssets\CompileAssets,
            new \KABBOUCHI\LogsTool\LogsTool,
            new \Strandafili\NovaInstalledPackages\Tool,
            new \Spatie\BackupTool\BackupTool,
            new \Sbine\RouteViewer\RouteViewer,
            new \Davidpiesse\NovaPhpinfo\Tool,
            new \Beyondcode\TinkerTool\Tinker,
            new \Bolechen\NovaActivitylog\NovaActivitylog,
            new \MadWeb\NovaTelescopeLink\TelescopeLink,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        Nova::resourcesIn(app_path('Nova'));
//        Nova::resources([
//            PageResource::class,
//        ]);
    }
}
