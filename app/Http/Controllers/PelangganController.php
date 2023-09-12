<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function profile()
    {
        // Mengambil data 'Pelanggan' yang terkait dengan pengguna yang sedang masuk
        $pelanggan = Pelanggan::where('id_user', Auth::user()->id)->first();
    
        if (!$pelanggan) {
            // Handle jika data 'Pelanggan' tidak ditemukan
            return redirect()->route('home')->with('error', 'Data profil pelanggan tidak ditemukan.');
        }
    
        return view('pelanggan.profile', ['pelanggan' => $pelanggan]);
    }

    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [ 
        'pelanggan' => $pelanggan
        ]);
    }

    public function create()
    {
        return view(
            'pelanggan.create', [
                'users' => User::all()
            ]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'id_user' =>'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto_pelanggan' => 'required',
        ]);
            $array = $request->only([
            'id_user',
            'no_hp',
            'alamat',
            'foto_pelanggan',
            ]);
            $array['foto_pelanggan'] = $request->file('foto_pelanggan')->store('Foto Pelanggan');
            $tambah=Pelanggan::create($array);
            if($tambah) $request->file('foto_pelanggan')->store('Foto Pelanggan');
            return redirect()->route('pelanggan.index')->with('success_message', 'Berhasil menambah paket wisata baru');
    }
    

    
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan)return redirect()->route('pelanggan.index')->with('error_message', 'pelanggan dengan id' . $id . ' tidak ditemukan');
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'users' => User::all() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto_pelanggan' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $pelanggan = Pelanggan::find($id);
    
        $pelanggan->no_hp = $request->input('no_hp');
        $pelanggan->alamat = $request->input('alamat');
    
        // Perbarui data pengguna (User) terkait jika diperlukan
        if ($pelanggan->id_user) {
            $user = User::find($pelanggan->id_user);
            $user->name = $request->input('name');
            $user->save();
        }
    
        if ($request->hasFile('foto_pelanggan')) {
            // Hapus gambar lama jika ada
            if ($pelanggan->foto_pelanggan) {
                Storage::disk('public')->delete('Foto Pelanggan/' . $pelanggan->foto_pelanggan);
            }
    
            // Upload gambar yang baru
            $foto_pelanggan = $request->file('foto_pelanggan');
            $namafoto_pelanggan = time() . '.' . $foto_pelanggan->getClientOriginalExtension();
            Storage::disk('public')->put('Foto Pelanggan/' . $namafoto_pelanggan, file_get_contents($foto_pelanggan));
            $pelanggan->foto_pelanggan = $namafoto_pelanggan;
        }
    
        $pelanggan->save();
    
        return redirect()->route('pelanggan.profile')->with('success_message', 'Berhasil mengubah Pelanggan');
    }
        
    
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            $hapus = $pelanggan->delete();
            if ($hapus)
                unlink("storage/Foto" . $pelanggan->foto);     
        }
        return redirect()->route('pelanggan.index')->with('success_message', 'Berhasil menghapus Pelanggan ');
        }
    }