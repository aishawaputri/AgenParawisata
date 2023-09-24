<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'foto1' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto2' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto3' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto4' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto5' => 'mimes:pdf,doc,docx,png,jpg,jpeg' 
        ]);
        $paket_wisata = new PaketWisata();

        $paket_wisata->nama_paket = $request->nama_paket;
        $paket_wisata->deskripsi = $request->deskripsi;
        $paket_wisata->fasilitas = $request->fasilitas;
        $paket_wisata->itinerary = $request->itinerary;
        $paket_wisata->diskon = $request->diskon;

        if ($request->hasFile('foto1')) {
            // Upload dan simpan file jika ada
            $foto1 = $request->file('foto1');
            $fileFoto1 = Str::random(20) . '.' . $foto1->getClientOriginalExtension();
            $foto1->storeAs('Foto 1', $fileFoto1, 'public');
            $paket_wisata->foto1 = $fileFoto1;
        } else {
            $paket_wisata->foto1 = null; 
        }

        if ($request->hasFile('foto2')) {
            
            $foto2 = $request->file('foto2');
            $fileFoto2 = Str::random(20) . '.' . $foto2->getClientOriginalExtension();
            $foto2->storeAs('Foto 2', $fileFoto2, 'public');
            $paket_wisata->foto2 = $fileFoto2;
        } else {
            $paket_wisata->foto2 = null; 
        }

         if ($request->hasFile('foto3')) {
            
            $foto3 = $request->file('foto3');
            $filefoto3 = Str::random(20) . '.' . $foto3->getClientOriginalExtension();
            $foto3->storeAs('Foto 3', $filefoto3, 'public');
            $paket_wisata->foto3 = $filefoto3;
        } else {
            $paket_wisata->foto3 = null; 
        }

         if ($request->hasFile('foto4')) {
            
            $foto4 = $request->file('foto4');
            $filefoto4 = Str::random(20) . '.' . $foto4->getClientOriginalExtension();
            $foto4->storeAs('Foto 4', $filefoto4, 'public');
            $paket_wisata->foto4 = $filefoto4;
        } else {
            $paket_wisata->foto4 = null; 
        }

        if ($request->hasFile('foto5')) {
            
            $foto5 = $request->file('foto5');
            $filefoto5 = Str::random(20) . '.' . $foto5->getClientOriginalExtension();
            $foto5->storeAs('Foto 5', $filefoto5, 'public');
            $paket_wisata->foto5 = $filefoto5;
        } else {
            $paket_wisata->foto5 = null; 
        }

        $paket_wisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah data Paket Wisata');
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
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto2' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto3' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto4' => 'mimes:pdf,doc,docx,png,jpg,jpeg',
            'foto5' => 'mimes:pdf,doc,docx,png,jpg,jpeg'
        ]);
        $paket_wisata = Paketwisata::find($id);
        $paket_wisata->nama_paket = $request->nama_paket;
        $paket_wisata->deskripsi = $request->deskripsi;
        $paket_wisata->fasilitas = $request->fasilitas;
        $paket_wisata->itinerary = $request->itinerary;
        $paket_wisata->diskon = $request->diskon;
        // $paket_wisata->foto1 = $request->file('foto1')->store('Foto 1');

        if ($request->hasFile('foto1')) {
            if ($paket_wisata->foto1) {
                Storage::disk('public')->delete('foto1/'.$paket_wisata->foto1);
            }
            $foto1 = $request->file('foto1');
            $namafoto1 = time().'.'.$foto1->getClientOriginalExtension();
            Storage::disk('public')->put('file_perizinan/'.$namafoto1, file_get_contents($foto1));
            $paket_wisata->foto1 = $namafoto1;
        }
        if ($request->hasFile('foto2')) {
            if ($paket_wisata->foto2) {
                Storage::disk('public')->delete('foto2/'.$paket_wisata->foto2);
            }
            $foto2 = $request->file('foto2');
            $namafoto2 = time().'.'.$foto2->getClientOriginalExtension();
            Storage::disk('public')->put('file_perizinan/'.$namafoto2, file_get_contents($foto2));
            $paket_wisata->foto2 = $namafoto2;
        }
        if ($request->hasFile('foto3')) {
            if ($paket_wisata->foto3) {
                Storage::disk('public')->delete('foto3/'.$paket_wisata->foto3);
            }
            $foto3 = $request->file('foto3');
            $namafoto3 = time().'.'.$foto3->getClientOriginalExtension();
            Storage::disk('public')->put('file_perizinan/'.$namafoto3, file_get_contents($foto3));
            $paket_wisata->foto3 = $namafoto3;
        }
        if ($request->hasFile('foto4')) {
            if ($paket_wisata->foto4) {
                Storage::disk('public')->delete('foto4/'.$paket_wisata->foto4);
            }
            $foto4 = $request->file('foto4');
            $namafoto4 = time().'.'.$foto4->getClientOriginalExtension();
            Storage::disk('public')->put('file_perizinan/'.$namafoto4, file_get_contents($foto4));
            $paket_wisata->foto4 = $namafoto4;
        }
        if ($request->hasFile('foto5')) {
            if ($paket_wisata->foto5) {
                Storage::disk('public')->delete('foto5/'.$paket_wisata->foto5);
            }
            $foto5 = $request->file('foto5');
            $namafoto5 = time().'.'.$foto5->getClientOriginalExtension();
            Storage::disk('public')->put('file_perizinan/'.$namafoto5, file_get_contents($foto5));
            $paket_wisata->foto5 = $namafoto5;
        }
       $paket_wisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
    }

    public function destroy(string $id)
    {
        $paket_wisata = PaketWisata::find($id);
        if ($paket_wisata) {
            $paket_wisata->delete();
        }
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata');
        }

    // one to one relationship    
    public function daftar_paket(){
        $paket_wisata = PaketWisata::all();
        return view('admin.paket_wisata.daftar_paket', ['paket_wisata' => $paket_wisata]);   
    }
    }
