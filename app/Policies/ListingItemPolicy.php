<?php

namespace App\Policies;

use App\Models\ListingItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingItemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any listing_item');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ListingItem $listingItem): bool
    {
        return $user->can('view listing_item');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create listing_item');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ListingItem $listingItem): bool
    {
        return $user->can('update listing_item');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ListingItem $listingItem): bool
    {
        return $user->can('delete listing_item');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ListingItem $listingItem): bool
    {
        return $user->can('restore listing_item');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ListingItem $listingItem): bool
    {
        return $user->can('force_delete listing_item');
    }

    public function replicate(User $user, ListingItem $listingItem): bool
    {
        return $user->can('replicate listing_item');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder listing_item');
    }

    public function lock(User $user, ListingItem $listingItem): bool
    {
        return $user->can('lock listing_item');
    }
}
