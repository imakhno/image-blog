<?php

namespace App\Http\Controllers;

use App\Services\UserProfileDataService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserProfileDataController extends Controller
{
    protected UserProfileDataService $userProfileDataService;

    /**
     * @param UserProfileDataService $userProfileDataService
     */
    public function __construct(UserProfileDataService $userProfileDataService)
    {
        $this->userProfileDataService = $userProfileDataService;
    }

    /**
     * @return View
     */
    public function getAuthenticatedUserDTO(): View
    {
        $userDTO = $this->userProfileDataService->getAuthenticatedUserDTO();

        if (!$userDTO) {
            abort(403, 'Unauthorized');
        }

        return view('profile', compact('userDTO'));
    }
}
