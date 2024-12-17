<?php

namespace App\Http\Requests;

use App\Services\DTO\UserRegistrationDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 */
class RegisterRequest extends FormRequest
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100|string',
            'surname' => 'required|max:100|string',
            'email' => 'required|email|unique:users|max:100|string',
            'password' => 'required|unique:users|min:6|max:100|string',
            'password_confirmation' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать :max символов.',

            'surname.required' => 'Фамилия обязательна для заполнения.',
            'surname.string' => 'Фамилия должна быть строкой.',
            'surname.max' => 'Фамилия не должна превышать :max символов.',

            'email.required' => 'Адрес электронной почты обязателен для заполнения.',
            'email.email' => 'Пожалуйста, введите корректный адрес электронной почты.',
            'email.unique' => 'Этот адрес электронной почты уже занят.',

            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен содержать не менее :min символов.',
            'password.confirmed' => 'Пароли не совпадают.',

            'password_confirmation.required' => 'Повтор пароля обязателен для заполнения.',
        ];
    }


    /**
     * @return UserRegistrationDTO
     */
    public function createRegisterNewUserDto(): UserRegistrationDTO
    {
        return new UserRegistrationDTO(
            $this->input('name'),
            $this->input('surname'),
            $this->input('email'),
            $this->input('password')
        );
    }
}
