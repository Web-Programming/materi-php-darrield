<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listprodi = Prodi::get(); //select * from prodis;
        //$listprodi = DB::table("prodis")->get();
        return view("prodi.index", 
            ['listprodi' => $listprodi]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("prodi.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Form Validation

        $data = $request->all();
        //cara 1
        //response object dari created data
        Prodi::create([
            'kode_prodi' => $data['kode_prodi'],
            'nama' => $data['nama'],
        ]);
        
        //cara 2
        //response true atau false
        // Prodi::insert([
        //     'kode_prodi' => $data['kode_prodi'],
        //     'nama' => $data['nama'],
        // ]);
        
        //cara 3
        // $newprodi = new Prodi();
        // $newprodi->kode_prodi = $data['kode_prodi'];
        // $newprodi->nama = $data['nama'];
        // $newprodi->save();

        //arahkan/pindahkan ke halaman tujuan
        return redirect("prodi")->with("status", "Program Studi berhasil disimpan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("prodi.detail");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("prodi.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
