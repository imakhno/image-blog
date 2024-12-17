<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    protected LoginService $loginService;

    /**
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return $this->loginService->index();
    }


    /**
     * @param LoginRequest $loginRequest
     * @return RedirectResponse
     */
    public function store(LoginRequest $loginRequest): RedirectResponse
    {

        if ($this->loginService->store($loginRequest->getEmail(), $loginRequest->getPassword())) {
            return redirect()->route('profile');
        }

        return back()->withInput()->withErrors(['password' => 'Неверный логин или пароль']);
    }

}
