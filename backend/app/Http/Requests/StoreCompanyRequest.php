<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest  extends FormRequest
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
            'owner_id' => ["required", "numeric", "exists:users,id"],
            'name' => ["required", "string"],
            'city' => ["string"],
            'address' => ["string"],
            'zip' => ["string"],
            'phone' => ["string"],
            'state' => ["string"],
        ];
    }
}

