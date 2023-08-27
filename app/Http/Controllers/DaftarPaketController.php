<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    
    public function index()
    {
        $daftar_paket = DaftarPaket::all();
        return view('daftar_paket.index', [
        'daftar_paket' => $daftar_paket
        ]);
    }

  
    public function create()
    {
        return view(
            'daftar_paket.create', [
                'paket_wisata' => PaketWisata::all()
            ]);
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' =>'required',
            'id_paket_wisata'=> 'required', 
            'jumlah_peserta' => 'required',
            'harga_paket' => 'required'

            ]);
            $array = $request->only([
            'nama_paket', 'id_paket_wisata', 'jumlah_peserta', 'harga_paket'
            ]);
            $daftar_paket = DaftarPaket::create($array);
            return redirect()->route('daftar_paket.index')
            ->with('success_message', 'Berhasil menambah daftar paket baru!');
           
    }

    public function edit(string $id)
    {
        $daftar_paket = DaftarPaket::find($id);
        if (!$daftar_paket)return redirect()->route('daftar_paket.index')->with('error_message', 'pelanggan dengan id' . $id . ' tidak ditemukan');
        return view('daftar_paket.edit', [
            'daftar_paket' => $daftar_paket,
            'paket_wisata' => PaketWisata::all() 
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_paket' =>'required',
            'id_paket_wisata'=> 'required', 
            'jumlah_peserta' => 'required',
            'harga_paket' => 'required'

        ]);
        $daftar_paket = DaftarPaket::find($id);
        $daftar_paket->nama_paket = $request->nama_paket;
        $daftar_paket->id_paket_wisata = $request->id_paket_wisata;
        $daftar_paket->jumlah_peserta = $request->jumlah_peserta;
        $daftar_paket->harga_paket = $request->harga_paket;
        $daftar_paket->save();
         return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil mengubah Daftar Paket');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daftar_paket = DaftarPaket::find($id);
        if ($daftar_paket) $daftar_paket->delete();
        return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil menghapus daftar paket');
    }
}