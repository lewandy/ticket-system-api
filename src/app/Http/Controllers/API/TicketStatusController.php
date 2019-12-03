<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\TicketStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TicketStatusController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function __invoke()
    {
        $data = TicketStatus::all();
        return response()->json($data, 200);
    }
}
