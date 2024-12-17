<?php

namespace App\Http\Controllers;

use App\Services\LogoutService;
use Illuminate\Http\RedirectResponse;

class LogoutController
{
    protected LogoutService $logoutService;

    /**
     * @param LogoutService $logoutService
     */
    public function __construct(LogoutService $logoutService)
    {
        $this->logoutService = $logoutService;
    }

    /**
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        $this->logoutService->destroy();
        return redirect()->route('home');
    }
}
