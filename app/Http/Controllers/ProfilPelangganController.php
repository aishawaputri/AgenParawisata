<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilPelangganController extends Controller
{
    public function profile()
    {
        // Mengambil data 'Pelanggan' yang terkait dengan pengguna yang sedang masuk
        $pelanggan = Pelanggan::where('id_user', Auth::user()->id)->first();
    
        if (!$pelanggan) {
            // Handle jika data 'Pelanggan' tidak ditemukan
            return redirect()->route('home')->with('error', 'Data profil pelanggan tidak ditemukan.');
        }
    
        return view('profil_pelanggan.index', ['pelanggan' => $pelanggan]);
    }
    
        public function edit($id)
 {
        //Menampilkan Form Edit pelanggan
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return redirect()->route('profil_pelanggan.index')->with('error_message', 'pelanggan dengan id = '.$id.' tidak ditemukan');
        return view('profil_pelanggan.edit', [
        'pelanggan' => $pelanggan
        ]);
        }
        public function update(Request $request, $id)
        {
        //Mengedit Data pelanggan
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => $request->file('foto') != null ?'image|file|max:2048' : ''
              
            ]);
            $pelanggan = Pelanggan::find($id);
            $pelanggan->nama_lengkap = $request->nama_lengkap;
            $pelanggan->no_hp = $request->no_hp;
            $pelanggan->alamat = $request->alamat;
            if($request->file('foto') != null){
                unlink("storage/" . $pelanggan->foto);
                $pelanggan->foto = $request->file('foto')->store('Foto');
                } 
           
            $pelanggan->save();
            return redirect()->route('profil_pelanggan.index')->with('success_message', 'Berhasil mengubah profil pelanggan');
            } 
        }