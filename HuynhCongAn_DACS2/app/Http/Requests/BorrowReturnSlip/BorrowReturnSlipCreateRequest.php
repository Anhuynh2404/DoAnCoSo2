<?php

namespace App\Http\Requests\BorrowReturnSlip;

use Illuminate\Foundation\Http\FormRequest;

class BorrowReturnSlipCreateRequest extends FormRequest
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
            'card_id' => 'required',
            'user_id' => 'required',
            'book_id' => 'required',
        ];
    }
}