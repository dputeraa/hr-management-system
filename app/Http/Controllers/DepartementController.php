<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::get();
        $view_data = [
            'departements' => $departements,
        ];
        return view('departement.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_departement' => 'required'
        ]);

        $name_departement = $request->input('name_departement');

        Departement::create([
            'name_departement' => $name_departement
        ]);

        Session::flash('success_add', 'Data berhasil ditambahkan.');
        return redirect('departement');
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
        $departement = Departement::where('id', $id)
            ->first();
        $view_data = [
            'departement' => $departement
        ];
        return view('departement.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_departement' => 'required',
        ]);

        $name_departement = $request->input('name_departement');

        Departement::where('id', $id)
            ->update([
                'name_departement' => $name_departement,
            ]);
        Session::flash('success_update', 'Data berhasil diubah.');

        return redirect("departement");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Departement::where('id', $id)->delete();
        Session::flash('success_destroy', 'Data berhasil dihapus.');

        return redirect("departement");
    }
}
