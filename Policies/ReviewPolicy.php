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

    public function before(User $user): ?bool
    {
        if($user->hasRole('super-admin')) {
            return true;
        }
        else {
            return null;
        }
    }

    public function view(User $user, Review $review): bool
    {
        return $user->hasAnyRole(['user']);
    }

    public function replicate(User $user, Review $review): bool
    {
        return $user->hasAnyRole(['admin']);
    }

    public function edit(User $user, Review $review): bool
    {
        return $user->hasAnyRole(['admin']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['user']);
    }

    public function update(User $user, Review $review): bool
    {
        return $user->hasAnyRole(['admin']);
    }

    public function delete(User $user, Review $review): bool
    {
        return $user->hasAnyRole(['admin']);
    }
}
