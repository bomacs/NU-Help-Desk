<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'title',
        'description',
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
        'deleted_at'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
