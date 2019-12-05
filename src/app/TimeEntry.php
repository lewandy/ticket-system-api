<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'ticket_id',
        'date_from',
        'date_to',
        'note'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }
}
