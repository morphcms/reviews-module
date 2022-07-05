<?php

namespace Modules\Reviews\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Reviews\Models\Review;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function view(User $user, Review $review): bool
    {
        return $user->can('reviews.view');
    }

    public function viewAny(User $user): bool
    {
        return $user->can('reviews.viewAny');
    }

    public function replicate(User $user, Review $review): bool
    {
        return $user->can('reviews.replicate');
    }

    public function edit(User $user, Review $review): bool
    {
        return $user->can('reviews.edit');
    }

    public function create(User $user): bool
    {
        return $user->can('reviews.create');
    }

    public function update(User $user, Review $review): bool
    {
        return $user->can('reviews.update');
    }

    public function delete(User $user, Review $review): bool
    {
        return $user->can('reviews.delete');
    }
}
