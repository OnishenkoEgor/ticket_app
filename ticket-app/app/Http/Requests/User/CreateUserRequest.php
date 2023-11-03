<?php

namespace App\Http\Requests\User;

use App\Dto\User\CreateUserDto;
use App\Http\Requests\RequestWithDtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest implements RequestWithDtoInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string']
        ];
    }

    /**
     * @return CreateUserDto
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getDto(): CreateUserDto
    {
        return new CreateUserDto([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }
}
