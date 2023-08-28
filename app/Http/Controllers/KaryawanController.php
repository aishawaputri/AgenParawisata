<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', [ 
        'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'karyawan.create', [
                'users' => User::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required' , 
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',       
        ]);
        $array = $request->only([
            'id_user','alamat','no_hp','jabatan'
        ]);
        // dd($request);
            $aryawan = Karyawan::create($array);
            return redirect()->route('karyawan.index')
            ->with('success_message', 'Data berhasil ditambahkan');
    }

   
    public function edit(string $id)
    {
        $karyawan = Karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawan.index')->with
        ('error_message', 'karyawan dengan id = '.$id.' tidak ditemukan');
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'users' => User::all() 
 ]);
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_user' => 'required' , 
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',     
            ]);
            $karyawan= Karyawan::find($id);
            $karyawan-> id_user = $request->id_user;
            $karyawan-> alamat = $request->alamat;
            $karyawan-> no_hp = $request->no_hp;
            $karyawan-> jabatan = $request->jabatan;
            $karyawan->save();
            return redirect()->route('karyawan.index')->with('success_message', 'Berhasil mengubah Karyawan!');
    }

    
    public function destroy(string $id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success_message', 'Berhasil menghapus karyawan');
    }
}