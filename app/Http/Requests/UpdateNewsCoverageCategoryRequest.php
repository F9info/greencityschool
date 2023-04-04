<?php

namespace App\Http\Requests;

use App\Models\NewsCoverageCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsCoverageCategoryRequest extends FormRequest
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
        $rules = NewsCoverageCategory::$update_rules;
        
        return $rules;
    }
}
