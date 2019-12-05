<?php

namespace App\Http\Controllers\API;

use App\Ticket;
use App\Employee;
use App\TicketEmployee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TicketResource as TicketResource;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = TicketResource::collection(Ticket::all());
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'description' => 'required|string',
            'employees' => 'required|array',
            'status_id' => 'required|numeric|exists:ticket_statuses,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            DB::beginTransaction();

            $ticket = new Ticket([
                'subject' => $request['subject'],
                'description' => $request['description'],
                'status_id' => $request['status_id']
            ]);
            $ticket->save();
            foreach ($request->employees as $employee) {
                TicketEmployee::create([
                    "employee_id" => $employee['id'],
                    "ticket_id" => $ticket->id
                ]);
            }

            DB::commit();
            return response()->json($ticket, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        try {
            $resource = new TicketResource($ticket);
            return response()->json($resource, isset($ticket) ? 200 : 404);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'description' => 'required',
            'status_id' => 'required|numeric',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        $ticket->subject = $request['subject'];
        $ticket->description = $request['description'];
        $ticket->status_id = $request['status_id'];

        try {
            $ticket->save();
            return response()->json($ticket, 200);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        try {
            $ticket->delete();
            return response()->json(['message' => 'Deleted'], 200);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 500);
        }
    }

    /**
     * @param int $ticketId
     * @param int $employeeId
     */
    public function addEmployeeToTicket($ticketId, $employeeId)
    {
        try {
            $ticketEmployee = new TicketEmployee([
                'employee_id' => $employeeId,
                'ticket_id' => $ticketId
            ]);
            $ticketEmployee->save();
            return response()->json(['message' => 'Employee assigned to ticket'], 200);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 500);
        }
    }
}
