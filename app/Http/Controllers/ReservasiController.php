<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\Reservasi;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('reservasi.index', [
        'reservasi' => $reservasi,
        'daftarpaket' => DaftarPaket::all(),
        ]
        );
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
        
        // dd($request);
        $request->validate([
            'id_pelanggan' => 'required',
            'id_daftar_paket'=>'required',
            'nama_paket'=>'required',
            'tgl_reservasi_wisata'=>'required',
            'jumlah_peserta'=>'required',
            'harga_paket'=>'required',
            'diskon'=>'required',
            'nilai_diskon'=>'required',
            'total_bayar'=>'required',
            'file_bukti_tf'=>'image',
            // 'status_reservasi_wisata'=>'required'
        ]);

        $id_pelanggan = Auth::user()->pelanggan->id;
        $idDaftarPaket = $request->input('id_daftar_paket');
        $daftarPaket = DaftarPaket::find($request->id_daftar_paket);
        
        $inputDiskon = $request -> input('diskon');
        $diskonDecimal = floatval(str_replace('%', '', $inputDiskon)) / 100;

        if (!$daftarPaket) {
            return redirect()->back()->with('error_message', 'Paket tidak ditemukan');
        }
        
        $reservasi = new Reservasi();
        $reservasi->id_pelanggan = $id_pelanggan;
        $reservasi->id_daftar_paket = $idDaftarPaket;
        $reservasi->nama_paket = $request->nama_paket;
        $reservasi->tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
        $reservasi->jumlah_peserta = $request->jumlah_peserta;
        $reservasi->harga_paket = $request->harga_paket;
        $reservasi->diskon = $diskonDecimal ;
        $reservasi->nilai_diskon = $request->nilai_diskon;
        $reservasi->total_bayar = $request->total_bayar; // Menggunakan total bayar yang dihitung
        $reservasi->file_bukti_tf = $request->file_bukti_tf;
        // $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;
        $reservasi->save();
        
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menambah data Reservasi');
        
    }

    public function edit(string $id)
    {
        
        $reservasi = reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')->with
        ('error_message', 'reservasi dengan id = '.$id.' tidak ditemukan');
        return view('reservasi.edit', [
            'reservasi' => $reservasi,
            'pelanggan' => Pelanggan::all(),
            'daftar_paket' => DaftarPaket::all()
        ]);
    }

  
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pelanggan' =>'required',
            'id_daftar_paket'=>'required',
            'tgl_reservasi_wisata'=>'required',
            'harga'=>'required',
            'jumlah_peserta'=>'required',
            'diskon'=>'required',
            'nilai_diskon'=>'required',
            'total_bayar'=>'required',
            'file_bukti_tf'=>'required|image|file|max:2048',
            'status_reservasi_wisata'=>'required'
            ]);
            $reservasi= Reservasi::find($id);
            $reservasi-> id_pelanggan = $request->id_pelanggan;
            $reservasi-> id_daftar_paket = $request->id_daftar_paket;
            $reservasi-> tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
            $reservasi-> harga = $request->harga;
            $reservasi-> jumlah_peserta = $request->jumlah_peserta;
            $reservasi-> diskon= $request->diskon;
            $reservasi-> nilai_diskon = $request->nilai_diskon;
            $reservasi-> total_bayar = $request->total_bayar;
            $reservasi-> file_bukti_tf = $request->file('file_bukti_tf')->store('Bukti Transfer');
            $reservasi-> status_reservasi_wisata = $request->status_reservasi_wisata;
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