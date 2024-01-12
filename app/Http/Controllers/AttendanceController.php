<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::get();
        $view_data = [
            'attendances' => $attendances,
        ];
        return view('attendance.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attendances = Attendance::all();
        $employees = Employee::all();
        return view('attendance.create', compact('attendances', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'attendance_date' => 'required',
            'status' => 'required',
        ]);

        $employee_id = $request->input('employee_id');
        $attendance_date = $request->input('attendance_date');
        $status = $request->input('status');

        Attendance::create([
            'employee_id' => $employee_id,
            'attendance_date' => $attendance_date,
            'status' => $status,
        ]);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('attendance');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::where('id', $id)
            ->first();
        $employee = Employee::all();
        $view_data = [
            'attendance' => $attendance,
            'employee' => $employee,
        ];
        return view('attendance.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'attendance_date' => 'required',
            'status' => 'required',
        ]);

        $employee_id = $request->input('employee_id');
        $attendance_date = $request->input('attendance_date');
        $status = $request->input('status');

        Attendance::where('id', $id)
            ->update([
                'employee_id' => $employee_id,
                'attendance_date' => $attendance_date,
                'status' => $status,
            ]);
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("attendance");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Attendance::where('id', $id)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("attendance");
    }
}
