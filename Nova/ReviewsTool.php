<?php

namespace Modules\Reviews\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Tool;
use Modules\Appointment\Nova\Resources\Meeting;
use Modules\Reviews\Nova\Resources\Review;
use Nova;

class ReviewsTool extends Tool
{
    protected static array $resources = [
        Review::class,
    ];

    public function boot()
    {
        Nova::resources(static::$resources);
    }

    public function menu(Request $request)
    {
//        return MenuSection::make('Reviews', [
//            MenuItem::resource(Review::class)->canSee(fn() => $request->user()->can('reviews.viewAny')),
//        ])->icon('annotation')->collapsable();

        return MenuSection::resource(Review::class)
            ->icon('annotation')
            ->canSee(fn () => $request->user()->can('reviews.viewAny'));
    }
}
