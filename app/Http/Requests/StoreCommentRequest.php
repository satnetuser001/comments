<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'userName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'homePage' => 'nullable|url|max:255',
            'captcha' => 'required|captcha',
            'text' => 'required|max:65535',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'userName.required' => 'Имя не должно быть пустым',
            'userName.max' => 'Имя не должно содержать более 255 символов',

            'email.required' => 'Email не должен быть пустым',
            'email.email' => 'Email должен быть формата example@example.com',
            'email.max' => 'Email не должен содержать более 255 символов',

            'homePage.url' => 'Домашняя страница должна быть формата http://example.com',
            'homePage.max' => 'Домашняя страница не должна содержать более 255 символов',

            'text.required' => 'Комментарий не должен быть пустым',
            'text.max' => 'Комментарий не должен содержать более 65 535 символов',
        ];
    }
}
