<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::get();
        $view_data = [
            'leaves' => $leaves,
        ];
        return view('leave.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaves = Leave::all();
        $employees = Employee::all();
        return view('leave.create', compact('leaves', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $employee_id = $request->input('employee_id');
        $leave_type = $request->input('leave_type');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        Leave::create([
            'employee_id' => $employee_id,
            'leave_type' => $leave_type,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
        ]);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('leave');
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
        $leave = Leave::where('id', $id) // ->where('id', '=', $id) tanpa menuliskan "=" laravel menganggapnya menggunakan operator sama dengan "="
            ->first();
        $employee = Employee::all();
        $view_data = [
            'leave' => $leave,
            'employee' => $employee,
        ];
        return view('leave.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        $employee_id = $request->input('employee_id');
        $leave_type = $request->input('leave_type');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        Leave::where('id', $id)
            ->update([
                'employee_id' => $employee_id,
                'leave_type' => $leave_type,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'status' => $status,
            ]);
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("leave");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Leave::where('id', $id)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("leave");
    }
}
