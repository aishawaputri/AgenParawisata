<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\Pelanggan;
use App\Models\Reservasi;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    public function IndexOpr(){

        $reservasi = Reservasi::all();
        return view('reservasi.indexOpr', [
        'reservasi' => $reservasi,
        'daftarpaket' => DaftarPaket::all(),
        ]
        );

    }

    public function index()
    {
        $user = auth()->user();
        $pelanggan = Pelanggan::where('id_user', $user->id)->first();

        if (!$pelanggan) {
            // Handle jika data 'Pelanggan' tidak ditemukan
            return redirect()->route('home')->with('error', 'Data profil pelanggan tidak ditemukan.');
        }
    
        // Ambil data reservasi berdasarkan ID pelanggan
        $reservasi = Reservasi::where('id_pelanggan', $pelanggan->id)->get();
                return view('reservasi.index', [
            'reservasi' => $reservasi,
            'daftarpaket' => DaftarPaket::all(),
        ]);
    }

   
    public function create()
    {
        return view(
            'reservasi.create', [
                'daftar_paket' => DaftarPaket::all(),
            ]);
    }

    public function store(Request $request)
    {   
        
        // dd($request->all());
        $request->validate([
            'id_pelanggan' => 'required',
            'id_daftar_paket'=>'required',
            'tgl_reservasi_wisata'=>'required|date',
            'jumlah_peserta'=>'required',
            'harga_paket'=>'required',
            'diskon'=>'required',
            'nilai_diskon'=>'required',
            'total_bayar'=>'required',
            'file_bukti_tf'=>'mimes:png,jpg,jpeg',
            // 'status_reservasi_wisata'=>'required'
        ]);

        $id_pelanggan = Auth::user()->pelanggan->id;
        $daftarPaket = DaftarPaket::find($request->id_daftar_paket);
        
        $inputDiskon = $request -> input('diskon');
        $diskonDecimal = floatval(str_replace('%', '', $inputDiskon)) / 100;

        if (!$daftarPaket) {
            return redirect()->back()->with('error_message', 'Paket tidak ditemukan');
        }
        
        $reservasi = new Reservasi();

        if ($request->hasFile('file_bukti_tf')) {
            // Upload dan simpan file jika ada
            $file = $request->file('file_bukti_tf');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('Bukti Transfer', $fileName, 'public');
            $reservasi->file_bukti_tf = $fileName;
        } else {
            $reservasi->file_bukti_tf = null; // Atur kolom file_perizinan menjadi NULL jika tidak ada file diunggah
        }

        $daftarPaket = DaftarPaket::find($request->id_daftar_paket);

        $reservasi->id_pelanggan = $id_pelanggan;
        $reservasi->id_daftar_paket = $daftarPaket->id;
        // $reservasi->nama_paket = $request->nama_paket;
        $reservasi->tgl_reservasi_wisata = \Carbon\Carbon::createFromFormat('Y-m-d', $request->tgl_reservasi_wisata);
        $reservasi->jumlah_peserta = $request->jumlah_peserta;
        $reservasi->harga_paket = $request->harga_paket;
        $reservasi->diskon = $diskonDecimal ;
        $reservasi->nilai_diskon = $request->nilai_diskon;
        $reservasi->total_bayar = $request->total_bayar; // Menggunakan total bayar yang dihitung
        // $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;
        $reservasi->save();
        
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menambah data Reservasi');
        
    }

    public function edit(string $id)
    {
        $reservasi = reservasi::find($id);
        if (!$reservasi) 
            return redirect()->route('reservasi.index')->with('error_message', 'reservasi dengan id = '.$id.' tidak ditemukan');

        return view('reservasi.edit', [
            'reservasi' => $reservasi,
            'pelanggan' => Pelanggan::all(),
            'daftar_paket' => DaftarPaket::all()
        ]);
    }

  
    public function update(Request $request, $id)
    {
        
        // dd($request->id_daftar_paket);
        $request->validate([
            'id_pelanggan' => 'required',
            'id_daftar_paket'=>'required',
            'tgl_reservasi_wisata'=>'required|date',
            'jumlah_peserta'=>'required',
            'harga_paket'=>'required',
            'diskon'=>'required',
            'nilai_diskon'=>'required',
            'total_bayar'=>'required',
            'file_bukti_tf'=>'image',
        ]);
        $reservasi= Reservasi::find($id);

        $diskonDecimal = floatval(str_replace('%', '', $request->diskon)) / 100;

        $reservasi-> id_pelanggan = $request->id_pelanggan;
        $reservasi-> id_daftar_paket = $request->id_daftar_paket;
        $reservasi-> tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
        $reservasi-> harga_paket = $request->harga_paket;
        $reservasi-> jumlah_peserta = $request->jumlah_peserta;
        $reservasi-> diskon= $diskonDecimal;
        $reservasi-> nilai_diskon = $request->nilai_diskon;
        $reservasi-> total_bayar = $request->total_bayar;

        if($request->hasFile('file_bukti_tf')) {
            if($reservasi->file_bukti_tf){
                Storage::disk('public')->delete('Bukti Transfer/'.$reservasi->file_bukti_tf);
            }
            
            $file_bukti_tf = $request->file('file_bukti_tf');
            $namafile_bukti_tf = time().'.'.$file_bukti_tf->getClientOriginalExtension();
            Storage::disk('public')->put('Bukti Transfer/'.$namafile_bukti_tf, file_get_contents($file_bukti_tf));
            $reservasi->file_bukti_tf = $namafile_bukti_tf;
        }
            $reservasi->save();
            
            return redirect()->route('reservasi.index')->with('success_message', 'Berhasil mengubah reservasi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservasi = reservasi::find($id);
        if ($reservasi) {
            $hapus = $reservasi->delete();
            if ($hapus)
                unlink("storage/" . $reservasi->file_bukti_tf);     
        }
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menghapus reservasi ');
        }
    }