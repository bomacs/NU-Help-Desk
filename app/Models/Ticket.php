<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'type_id',
        'details_desc',
        'attachments',
        'priority',
        'status',
        'acknowledged_by',
        'acknowledged_at',
        'created_by',
        'updated_by',
        'resolved_by',
        'resolved_at',
        'assigned_to',
        'assigned_by',
        'deleted_by',
        'deleted_at',
    ];

    /**
     * The relationship that should always be loaded
     */
    protected $with = ['user'];


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function ticket_type()
    {
        return $this->belongsTo(Ticket_type::class, 'type_id');
    }
}
