<?php

namespace App\Http\Requests;

use App\Dto\LoginDto;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LoginRequest extends FormRequest implements RequestWithDtoInterface
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Email incorrect.',
            'password.required' => 'Password is required.'
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function getDto(): LoginDto
    {
        return new LoginDto([
            'email' => $this->email,
            'password' => $this->password
        ]);
    }
}
