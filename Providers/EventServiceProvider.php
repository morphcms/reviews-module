<?php

namespace Modules\Reviews\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Morphling\Events\BootModulesNovaTools;
use Modules\Reviews\Listeners\RegisterReviewsNovaTool;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BootModulesNovaTools::class => [
            RegisterReviewsNovaTool::class,
        ],
    ];
}
