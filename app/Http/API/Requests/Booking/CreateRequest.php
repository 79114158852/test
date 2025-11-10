<?php

namespace App\Http\API\Requests\Booking;

use App\Models\HuntingBooking;
use Illuminate\Validation\Validator;

class CreateRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * @return array<mixed>
     */
    public function rules(): array
    {
        return [
            'tour_name' => 'required|string',
            'hunter_name' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'participants_count' => 'required|integer|min:0|max:10',
            'guide_id' => 'required|exists:App\Models\Guide,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Дополнительная проверка занятости гида
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ((bool) HuntingBooking::where('date', $this->date)->where('guide_id', $this->guide_id)->first()) {
                    $validator->errors()->add(
                        'guide_id',
                        'The guide is already busy on the selected date.'
                    );
                }
            },
        ];
    }
}
