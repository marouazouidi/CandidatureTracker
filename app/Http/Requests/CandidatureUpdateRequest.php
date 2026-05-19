<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CandidatureUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'poste_title' => 'required|string|max:255',
            'poste_url' => 'nullable|url|max:255',
            'status' => 'required|in:to_review,interview_scheduled,offer_received,rejected,abandoned',
            'priority' => 'required|in:low,medium,high',
            'notes' => 'nullable|string',
            'date' => 'required|date',
        ];
    }
}
