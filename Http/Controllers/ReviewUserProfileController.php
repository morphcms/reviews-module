<?php

namespace Modules\Reviews\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CHB\Models\UserProfile;
use Modules\Reviews\Transformers\ReviewResource;

class ReviewUserProfileController extends Controller
{
    public function __invoke(Request $request, UserProfile $userProfile)
    {
        if ($userProfile->user->id === auth()->id()) {
            return response('User cannot review his own profile.', 401);
        }

        $data = $request->validate([
            'rating' => ['required', 'numeric', 'between:0,5'],
            'message' => ['nullable', 'string'],
        ]);

        $review = $userProfile->reviews()->create([
            'user_id' => auth()->id(),
            ...$data,
        ]);

        return new ReviewResource($review);
    }
}
