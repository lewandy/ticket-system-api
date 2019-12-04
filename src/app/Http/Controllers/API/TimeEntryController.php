<?php

namespace App\Http\Controllers\API;

use App\TimeEntry;
use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TimeEntryResource as TimeEntryResource;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = TimeEntry::all();
            return response()->json(TimeEntryResource::collection($data));
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
            'employee_id' => 'required|exists:employees,id',
            'ticket_id' => 'required|exists:tickets,id',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'note' => 'string'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        $timeEntry = new TimeEntry([
            'employee_id' => $request['employee_id'],
            'ticket_id' => $request['ticket_id'],
            'date_from' => $request['date_from'],
            'date_to' => $request['date_to'],
            'note' => $request['note']
        ]);

        try {
            $timeEntry->save();
            return response()->json($timeEntry, 200);
        } catch (\Throwable $th) {
            return response()->json($validator->getMessages(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEntry $timeEntry)
    {
        try {
            return response()->json(new TimeEntryResource($timeEntry), 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeEntry $timeEntry)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'ticket_id' => 'required|exists:tickets,id',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'note' => 'string'
        ]);

        if ($validator->fails())
            return response()->json($validator->getMessages(), 400);

        $timeEntry->employee_id = $request['employee_id'];
        $timeEntry->ticket_id = $request['ticket_id'];
        $timeEntry->date_from = $request['date_to'];
        $timeEntry->date_to = $request['date_to'];
        $timeEntry->note = $request['note'];

        try {
            $timeEntry->save();
            return response()->json($timeEntry, 200);
        } catch (\Throwable $th) {
            return response()->json($validator->getMessages(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEntry $timeEntry)
    {
        //
    }
}
