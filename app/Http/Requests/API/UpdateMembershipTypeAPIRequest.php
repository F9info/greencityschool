<?php

namespace App\Http\Requests\API;

use App\Models\MembershipType;
use InfyOm\Generator\Request\APIRequest;

class UpdateMembershipTypeAPIRequest extends APIRequest
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
