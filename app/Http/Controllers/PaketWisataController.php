<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    
    public function index()
    {
        $paket_wisata = PaketWisata::all();
        return view('paket_wisata.index', [ 
        'paket_wisata' => $paket_wisata
        ]);
    }

    public function create()
    {
        return view('paket_wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|unique:paket_wisata,nama_paket',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'required|image|file|max:2048',
            'foto2' =>'required|image|file|max:2048',
            'foto3' =>'required|image|file|max:2048',
            'foto4' => 'required|image|file|max:2048',
            'foto5' => 'required|image|file|max:2048' 
        ]);
            $array = $request->only([
            'nama_paket',
            'deskripsi',
            'fasilitas',
            'itirnerary',
            'diskon',
            'foto1'.
            'foto2',
            'foto3',
            'foto4',
            'foto5'
            ]);
            $array['foto1'] = $request->file('foto1')->store('Foto 1');
            $array['foto2'] = $request->file('foto2')->store('Foto 2');
            $array['foto3'] = $request->file('foto3')->store('Foto 3');
            $array['foto4'] = $request->file('foto4')->store('Foto 4');
            $array['foto5'] = $request->file('foto4')->store('Foto 5');
            $tambah=PaketWisata::create($array);
            if($tambah) $request->file('foto1')->store('Foto 1');
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah paket wisata baru');
            if($tambah) $request->file('foto2')->store('Foto 2');
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah paket wisata baru');
            if($tambah) $request->file('foto3')->store('Foto 3');  
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah paket wisata baru');
            if($tambah) $request->file('foto4')->store('Foto 4');
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah paket wisata baru');
            if($tambah) $request->file('foto5')->store('Foto 5');
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah paket wisata baru');
    }

    public function edit(string $id)
    {
        $paket_wisata = PaketWisata::find($id);
        if (!$paket_wisata)
            return redirect()->route('paket_wisata.index')->with('error_message', 'paket dengan id' . $id . ' tidak ditemukan');
        return view('paket_wisata.edit', [
            'paket_wisata' => $paket_wisata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required|unique:paket_wisata,nama_paket',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'required|image|file|max:2048',
            'foto2' => 'required|image|file|max:2048',
            'foto3' => 'required|image|file|max:2048',
            'foto4' => 'required|image|file|max:2048',
            'foto5' => 'required|image|file|max:2048'
        ]);
       $paket_wisata = Paketwisata::find($id);
       $paket_wisata->nama_paket = $request->nama_paket;
       $paket_wisata->deskripsi = $request->deskripsi;
       $paket_wisata->fasilitas = $request->fasilitas;
       $paket_wisata->itinerary = $request->itinerary;
       $paket_wisata->diskon = $request->diskon;
       $paket_wisata->foto1 = $request->file('foto1')->store('Foto 1');
       $paket_wisata->foto2 = $request->file('foto2')->store('Foto 2');
       $paket_wisata->foto3 = $request->file('foto3')->store('Foto 3');
       $paket_wisata->foto4 = $request->file('foto4')->store('Foto 4');
       $paket_wisata->foto5 = $request->file('foto5')->store('Foto 5');
       $paket_wisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
    }

    public function destroy(string $id)
    {
        $paket_wisata = PaketWisata::find($id);
        if ($paket_wisata) {
            $hapus = $paket_wisata->delete();
            if ($hapus)
                unlink("storage/" . $paket_wisata->foto1);     
        }
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata');
        }

    // one to one relationship    
    public function daftar_paket(){
        $paket_wisata = PaketWisata::all();
        return view('admin.paket_wisata.daftar_paket', ['paket_wisata' => $paket_wisata]);   
    }
    }
