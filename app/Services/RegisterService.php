<?php

namespace App\Services;

use App\Models\User;
use App\Services\DTO\UserRegistrationDTO;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


class RegisterService
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('auth.register');
    }

    /**
     * @param UserRegistrationDTO $userRegistrationDTO
     * @return User
     * @throws Exception
     */
    public function store(UserRegistrationDTO $userRegistrationDTO): User
    {

        try {
            $user = User::create([
                'name' => $userRegistrationDTO->getName(),
                'surname' => $userRegistrationDTO->getSurname(),
                'email' => $userRegistrationDTO->getEmail(),
                'password' => Hash::make($userRegistrationDTO->getPassword()),
            ]);

            Auth::login($user);

            return $user;

        } catch (QueryException $queryException) {
            throw new Exception($queryException->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
