<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        Gate::authorize('viewAny', Prodi::class);
        $listprodi = Prodi::get();
        return view("prodi.index",
        ['listprodi' => $listprodi]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Prodi::class);
        return view("prodi.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('restore', Prodi::class);
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
            'kode_prodi' => 'required|min:2|max:2',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $prodi = new Prodi();
            $prodi->nama = $validateData['nama'];//
            $prodi->kode_prodi = $validateData['kode_prodi'];
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $filename);
                $prodi->logo = $filename;
            }
            $prodi->save();

            return redirect("prodi")->with("status","Data Program Studi Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('view', Prodi::class);
        $prodi = Prodi::find($id);
        return view("prodi.detail",['prodi' => $prodi]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('update', Prodi::class);
        $prodi = Prodi::find($id);
        return view("prodi.edit",['prodi' => $prodi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('update', Prodi::class);
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
            'kode_prodi' => 'required|min:2|max:2',
            ]);

            $prodi = Prodi::find($id);
            $prodi->nama = $validateData['nama'];//
            $prodi->kode_prodi = $validateData['kode_prodi'];


            $prodi->save();

            return redirect("prodi")->with("status","Data Program Studi Berhasil Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete', Prodi::class);
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect("prodi")->with("status","data program studi berhasil dihapus");
    }
}
