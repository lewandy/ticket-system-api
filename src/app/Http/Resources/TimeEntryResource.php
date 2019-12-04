<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => $this->employee,
            'ticket' => $this->ticket,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'note' => $this->note
        ];
    }
}
