<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sla_mins'
    ];

    public $timestamps = false;


    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}

