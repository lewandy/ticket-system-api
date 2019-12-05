<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'date', 'status_id',
    ];

    /**
     * Return employee relationship with the ticket.
     * @return App\Employee
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    /**
     * Return status relationship with the ticket
     */
    public function status()
    {
        return $this->belongsTo('App\TicketStatus');
    }
}
