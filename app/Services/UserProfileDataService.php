<?php

namespace App\Services;

use App\Models\User;
use App\Services\DTO\UserProfileDTO;
use Illuminate\Support\Facades\Auth;

class UserProfileDataService
{
    /**
     * @return UserProfileDTO|null
     */
    public function getAuthenticatedUserDTO(): ?UserProfileDTO
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return new UserProfileDTO(
            $user->name,
            $user->surname,
            $user->email,
            $user->image_path
        );
    }
}

