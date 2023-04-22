<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
        $today_date = date('YYYY-MM-DD');
        
        return [
            'department_id' => 'integer|exists:departments,id',
            'type_id' => 'integer|exists:ticket_types,id',
            'details_desc' => 'string|max:255',
            'attachments' => 'string|max:255',
            'priority' => 'string|max:255',
            'status' => 'string|max:255',
            'acknowledged_by' => 'integer',
            'acknowledged_at' => 'date_format:"YYYY-MM-DD hh:mm:ss"|after_or_equal'. $today_date ,
            'created_by' => 'integer|exists:users,id',
            'updated_by' => 'integer|exists:users,id',
            'resolved_by' => 'integer|exists:users, id',
            'resolved_at' => 'date_format:"YYYY-MM-DD hh:mm:ss"|after_or_equal' . $today_date ,
            'assigned_to' => 'integer|exists:users,id',
            'assigned_by' => 'integer|exists:users,id',
            'deleted_by' => 'integer|exists:users,id',
            'deleted_at' => 'date_format:"YYYY-MM-DD hh:mm:ss"|after_or_equal' . $today_date
        ];
    }
}
