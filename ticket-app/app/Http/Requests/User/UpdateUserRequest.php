<?php

namespace App\Http\Requests\User;

use App\Dto\User\UpdateUserDto;
use App\Http\Requests\RequestWithDtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest implements RequestWithDtoInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email']
        ];
    }

    /**
     * @return UpdateUserDto
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getDto(): UpdateUserDto
    {
        return new UpdateUserDto([
            'name' => $this->name,
            'email' => $this->email
        ]);
    }
}
