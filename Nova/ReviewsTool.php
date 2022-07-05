<?php

namespace Modules\Reviews\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Tool;
use Modules\Reviews\Nova\Resources\Review;

class ReviewsTool extends Tool
{
    protected static array $resources = [
        Review::class,
    ];

    public function boot()
    {
        \Nova::resources(static::$resources);
    }

    public function menu(Request $request)
    {
        return MenuSection::make('Reviews', [
            MenuItem::resource(Review::class)->canSee(fn() => true),
        ])->icon('annotation')->collapsable();
    }
}
