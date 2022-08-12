<?php

namespace Modules\Reviews\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\CHB\Models\UserProfile;
use Modules\Reviews\Transformers\ReviewResource;

class ProfileReviewsController extends Controller
{
    public function percentage($num_amount, $num_total): int
    {
        if ($num_total === 0) {
            return 0;
        }
        $count1 = $num_amount / $num_total;

        return (int) ($count1 * 100);
    }

    public function __invoke(UserProfile $userProfile): JsonResource
    {
        $reviews = $userProfile->reviews()->latest()->get();
        $numberOfReviews = $reviews->count();
        $ratings = [];
        $averageRating = 0;

        for ($i = 1; $i <= 5; $i++) {
            $ratings['rating_'.$i] = $this->percentage($reviews->where('rating', $i)->count(), $numberOfReviews);
            $averageRating += $ratings['rating_'.$i] * $i;
        }

        $averageRating = (int) (round($averageRating / 100));

        return new JsonResource([
            'statistics' => [
                'numberOfReviews' => $numberOfReviews,
                'averageRating' => $averageRating,
                ...$ratings,
            ],
            'reviews' => ReviewResource::collection($reviews),
        ]);
    }
}
