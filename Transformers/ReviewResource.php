<?php

namespace Modules\Reviews\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\CHB\Transformers\UserProfileResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'rating' => $this->rating,
            'message' => $this->message,
            'user' => new UserProfileResource($this->user->profile->load('media')),
        ];
    }
}
