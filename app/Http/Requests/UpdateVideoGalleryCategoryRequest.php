<?php

namespace App\Http\Requests;

use App\Models\VideoGalleryCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoGalleryCategoryRequest extends FormRequest
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
        $rules = VideoGalleryCategory::$update_rules;
        
        return $rules;
    }
}
