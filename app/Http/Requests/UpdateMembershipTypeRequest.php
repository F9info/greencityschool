<?php

namespace App\Http\Requests;

use App\Models\MembershipType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMembershipTypeRequest extends FormRequest
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
        $rules = MembershipType::$rules;
        
        return $rules;
    }
}
