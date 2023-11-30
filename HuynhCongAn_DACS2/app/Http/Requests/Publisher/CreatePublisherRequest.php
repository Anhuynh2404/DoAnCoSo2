<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;

class CreatePublisherRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:255','unique:publishers,name'],
            'address' => ['required','string','max:255'],
            'phone' => ['required','string','max:13','unique:publishers,phone'],
            'email' =>['required','string','max:255','unique:publishers,email']
        ];
    }
}
