                    <style>
table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f5f5f5;
}
                    </style>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr style="background-color:#6495ED">
                                <th>No.</th>
                                <th>ID Pelanggan</th>
                                <th>ID Daftar Paket</th>
                                <th>Tanggal Reservasi</th>
                                <th>Harga</th>
                                <th>Jumlah Peserta</th>
                                <th>Diskon</th>
                                <th>Nilai Diskon</th>
                                <th>Total Bayar</th>
                                <th>Bukti Transfer</th>
                                <th>Status Reservasi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasi as $key => $rv)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$rv->fpelanggan->id}}</td>
                                <td id={{$key+1}}>{{$rv->fdpaket->id}}</td>
                                <td>{{$rv->tgl_reservasi_wisata}}
                                </td>
                                <td>{{$rv->harga}}</td>
                                <td>{{$rv->jumlah_peserta}}</td>
                                <td>{{$rv->diskon}}</td>
                                <td>{{$rv->nilai_diskon}}</td>
                                <td>{{$rv->total_bayar}}</td>
                                <td>
                                    <img src="storage/{{$rv->file_bukti_tf}}" alt="{{$rv->file_bukti_tf}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td>
                                    @switch($rv->status_reservasi_wisata)
                                    @case('Pesan')
                                    Pesan
                                    @break
                                    @case('Dibayar')
                                    Dibayar
                                    @break
                                    @case('Selesai')
                                    Selesai
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>