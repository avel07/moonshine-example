<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\NewsSectionResource;
use App\MoonShine\Resources\TestResource;
use App\MoonShine\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        $config->authEnable();

        // $core->autoload();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                UserResource::class,
                TestResource::class,
                NewsResource::class,
                NewsSectionResource::class
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
