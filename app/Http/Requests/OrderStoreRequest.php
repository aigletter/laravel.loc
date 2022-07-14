<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'deadline' => ['required', 'date'],
            'product' => ['required', 'string'],
            'comment' => ['nullable','string', 'min:5', 'max:100'],
            'user_id' => ['exists:users,id']
        ];
    }
}
