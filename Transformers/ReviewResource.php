<?php

namespace Modules\Reviews\Transformers;

use App\Http\Resources\UserProfileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'rating' => $this->rating,
            'message' => $this->message,
            'user' => new UserProfileResource($this->user->profile->load('media')),
        ];
    }
}
