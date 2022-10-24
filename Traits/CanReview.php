<?php

namespace Modules\Reviews\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Reviews\Models\Review;

trait CanReview
{
    public function reviews(): HasMany
    {
       return $this->hasMany(Review::class);
    }
}
