<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::select(  'id',
                                    'nama',
                                    'jenis',
                                    'kondisi',
                                    'keterangan',
                                    'kecacatan',
                                    'jumlah',
                                    'gambar')->get();

        return view('index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'jenis' => 'required',
                'kondisi' => 'required',
                'keterangan' => 'required',
                'jumlah' => 'required|numeric',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'jenis.required' => 'Jenis tidak boleh kosong',
                'kondisi.required' => 'Kondisi tidak boleh kosong',
                'keterangan.required' => 'Keterangan tidak boleh kosong',
                'jumlah.required' => 'Jumlah tidak boleh kosong',
                'gambar.required' => 'Gambar tidak boleh kosong',
                'gambar.mimes' => 'Extension yang diperbolehkan hanya jpg, jpeg, png',
            ]
        );

        $gambar_file = $request->file('gambar');
        $gambar_ext = $gambar_file->extension();
        $gambar_new = date('ymdhis') . "." . $gambar_ext;
        $gambar_file->storeAs('public/gambar', $gambar_new);

        Barang::create([ 'nama' => $request->input('nama'),
            'jenis' => $request->input('jenis'),
            'kondisi' => $request->input('kondisi'),
            'keterangan' => $request->input('keterangan'),
            'kecacatan' => $request->input('kecacatan'),
            'jumlah' => $request->input('jumlah'),
            'gambar' => $gambar_new,
        ]);

        return redirect('/index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        //
        $barang = Barang::findOrFail($id);

        $request->validate(
            [
                'nama' => 'required',
                'jenis' => 'required',
                'kondisi' => 'required',
                'keterangan' => 'required',
                'jumlah' => 'required|numeric',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'jenis.required' => 'Jenis tidak boleh kosong',
                'kondisi.required' => 'Kondisi tidak boleh kosong',
                'keterangan.required' => 'Keterangan tidak boleh kosong',
                'jumlah.required' => 'Jumlah tidak boleh kosong',
                'gambar.required' => 'Gambar tidak boleh kosong',
                'gambar.mimes' => 'Extension yang diperbolehkan hanya jpg, jpeg, png',
            ]
        );

        $gambar_file = $request->file('gambar');
        $gambar_ext = $gambar_file->extension();
        $gambar_new = date('ymdhis') . "." . $gambar_ext;
        $gambar_file->storeAs('public/gambar', $gambar_new);

        $input = $request->all();

        $barang->fill($input)->save();

        return redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('index');
    }
}
