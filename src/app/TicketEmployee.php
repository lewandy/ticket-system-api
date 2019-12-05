<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketEmployee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'ticket_id'
    ];
}
