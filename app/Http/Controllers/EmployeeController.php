<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::whereHas('user', function ($query) {
            $query->where('role', 'employee');
        })->get();
        $view_data = [
            'employees' => $employees,
        ];
        return view('employee.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $employeedetails = EmployeeDetail::all();
        $positions = Position::all();
        $users = User::all();
        return view('employee.create', compact('employees', 'employeedetails', 'positions', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
            'birth_date' => 'required',
            'hire_date' => 'required',
            'position_id' => 'required',
            'salery' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'skill' => 'required',
            'certification' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $gender = $request->input('gender');
        $birth_date = $request->input('birth_date');
        $hire_date = $request->input('hire_date');
        $position_id = $request->input('position_id');
        $salery = $request->input('salery');
        $phone = $request->input('phone');
        $education = $request->input('education');
        $experience = $request->input('experience');
        $skill = $request->input('skill');
        $certification = $request->input('certification');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'employee'
        ]);

        $employee = Employee::create([
            'gender' => $gender,
            'birth_date' => $birth_date,
            'hire_date' => $hire_date,
            'position_id' => $position_id,
            'salery' => $salery,
            'phone' => $phone,
            'user_id' => $user->id,
        ]);

        EmployeeDetail::create([
            'employee_id' => $employee->id,
            'education' => $education,
            'experience' => $experience,
            'skill' => $skill,
            'certification' => $certification,
        ]);

        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('employee');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employeedetail = EmployeeDetail::where('id', $id)->first();
        $employee = Employee::all(); //mendapatkan data pertama / single data
        $position = Position::all();
        $user = User::all();

        $view_data = [
            'employee' => $employee,
            'employeedetail' => $employeedetail,
            'position' => $position,
            'user' => $user,
        ];
        return view('employee.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employeedetail = EmployeeDetail::where('id', $id)->first();
        $employee = Employee::all(); //mendapatkan data pertama / single data
        $position = Position::all();
        $user = User::all();

        $view_data = [
            'employee' => $employee,
            'employeedetail' => $employeedetail,
            'position' => $position,
            'user' => $user,
        ];
        return view('employee.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);

        $employee = Employee::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
            'birth_date' => 'required',
            'hire_date' => 'required',
            'position_id' => 'required',
            'salery' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'skill' => 'required',
            'certification' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $gender = $request->input('gender');
        $birth_date = $request->input('birth_date');
        $hire_date = $request->input('hire_date');
        $position_id = $request->input('position_id');
        $salery = $request->input('salery');
        $phone = $request->input('phone');
        $education = $request->input('education');
        $experience = $request->input('experience');
        $skill = $request->input('skill');
        $certification = $request->input('certification');

        $sameEmail = User::where('email', $email)->first();
        if ($sameEmail) {
            return redirect()->back()->with('error_message', 'Email sudah digunakan');
        }

        $user = User::find($employee->user_id);
        if ($user) {
            $user->fill([
                'email' => $email,
                'password' => $password,
                'name' => $name
            ]);
            $user->save();
        }

        Employee::where('id', $id)
            ->update([
                'gender' => $gender,
                'birth_date' => $birth_date,
                'hire_date' => $hire_date,
                'position_id' => $position_id,
                'salery' => $salery,
                'phone' => $phone,
                // 'user_id' => $user->id,
            ]); // sama seperti update ... where id = $id

        EmployeeDetail::where('id', $id)
            ->update([
                // 'employee_id' => $employee->id,
                'education' => $education,
                'experience' => $experience,
                'skill' => $skill,
                'certification' => $certification,
            ]);
        Session::flash('success_update', 'Data berhasil diubah.');
        return redirect("employee");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employeedetail = EmployeeDetail::find($id);
        $employeedetail->delete();
        $employee = Employee::find($employeedetail->employee_id);
        $employee->delete();
        User::find($employee->user_id)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("employee");
    }
}
