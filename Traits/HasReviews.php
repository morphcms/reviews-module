<?php

namespace Modules\Reviews\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Reviews\Models\Review;

trait HasReviews
{
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
