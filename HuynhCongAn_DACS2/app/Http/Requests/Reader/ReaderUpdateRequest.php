<?php

namespace App\Http\Requests\Reader;

use Illuminate\Foundation\Http\FormRequest;

class ReaderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:readers',
            'phone' => 'required|unique:readers',
            'address' => 'nullable',
            'cccd' => 'required|unique:readers',
            'gender' => 'in:Nam,Nữ,Khác',
            'faculty' => 'required',
            'major' => 'required',
            'class' => 'required',
            'note' => 'nullable',
            'end_date' => 'date',
            'status' => 'boolean',
        ];
    }
}
