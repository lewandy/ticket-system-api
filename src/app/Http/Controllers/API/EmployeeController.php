<?php

namespace App\Http\Controllers\API;

use Validator;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
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
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:employees',
            'password' => 'required|confirmed|string',
            'status' => 'required|bool'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $employee = new Employee([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'status' => $request['status'],
            'password' => Hash::make($request['password'])
        ]);

        try {
            $employee->save();
            return response()->json($employee, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response()->json($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'password' => 'required|confirmed|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $employee->name = $request['name'];
        $employee->last_name = $request['last_name'];
        $employee->email = $request['email'];
        $employee->status = $request['status'];
        $employee->password = Hash::make($request['password']);

        try {
            $employee->save();
            return response()->json($employee, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return response()->json(["message" => "employee deleted"]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th]);
        }
    }
}
