<?php

namespace App\Policies;

use App\Models\ResourceType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResourceTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function editResourceType(User $user, ResourceType $resourceType): bool
    {
        return $resourceType->user->is($user);
    }
}
