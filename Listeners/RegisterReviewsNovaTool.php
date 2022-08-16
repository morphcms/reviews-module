<?php

namespace Modules\Reviews\Listeners;

use Modules\Reviews\Nova\ReviewsTool;

class RegisterReviewsNovaTool
{
    public function __invoke($event): array
    {
        return [
            ReviewsTool::make(),
        ];
    }
}
