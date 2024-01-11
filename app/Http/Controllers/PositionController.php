<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Support\Facades\Session;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::get();
        $view_data = [
            'positions' => $positions,
        ];
        return view('position.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();
        $departements = Departement::all();
        return view('position.create', compact('positions', 'departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_position' => 'required',
            'departement_id' => 'required',
        ]);

        $name_position = $request->input('name_position');
        $departement_id = $request->input('departement_id');

        // jika menggunakan created tidak perlu memasukan created dan updated at dan harus menambahkan variable baru pada method post $fillable
        Position::create([
            'name_position' => $name_position,
            'departement_id' => $departement_id,
        ]);
        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('position');
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
        $position = Position::where('id', $id) // ->where('id', '=', $id) tanpa menuliskan "=" laravel menganggapnya menggunakan operator sama dengan "="
            ->first();
        $departement = Departement::all();
        $view_data = [
            'position' => $position,
            'departement' => $departement,
        ];
        return view('position.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_position' => 'required',
            'departement_id' => 'required',
        ]);

        $name_position = $request->input('name_position');
        $departement_id = $request->input('departement_id');;

        Position::where('id', $id)
            ->update([
                'name_position' => $name_position,
                'departement_id' => $departement_id,
            ]);
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("position");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Position::where('id', $id)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("position");
    }
}
