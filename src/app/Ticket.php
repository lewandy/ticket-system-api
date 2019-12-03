<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public function employee() {
        return $this->belongsTo('App\Employee');
    }

    public function status() {
        return $this->belongsTo('App\TicketStatus');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'date', 'employee_id', 'status_id',
    ];
}
