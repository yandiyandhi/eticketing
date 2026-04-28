<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Pengajuan Service</title>

    <style>
        @page {
            size: A4;
            margin: 150px 2cm 120px 2cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
        }

        /* HEADER FIXED */
        .header {
            position: fixed;
            top: -130px;
            left: 0;
            right: 0;
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
        }

        .header img {
            width: 350px;
        }

        .header p {
            margin: 3px 0;
            font-size: 14px;
        }


        /* CONTENT */
        .content {
            width: 100%;
            margin-top: 0;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding-top: 5px;
            padding-bottom: 5px;
            vertical-align: top;
        }

        .table {
            width: 70%;
        }

        .tableItem {
            width: 100%;
        }

        .tableItem thead {
            display: table-header-group;
        }

        /* spacer header setiap page */
        .tableItem thead::before {
            content: "";
            display: block;
            height: 30px;
        }

        .tableItem tfoot {
            display: table-row-group;
        }

        .tableItem tr {
            page-break-inside: avoid;
        }

        .tableItem tbody::before {
            content: "";
            display: table-row;
            height: 30px;
        }

        .tableItem th,
        .tableItem td {
            border: 1px solid black;
            padding: 6px;
        }

        .names {
            padding-left: 5px;
        }

        tr {
            page-break-inside: avoid;
        }

        .img {
            text-align: center;
            margin-top: 10px;
        }

        /* APPROVAL */
        .approval {
            margin-top: 40px;
        }

        .approval-table {
            width: 100%;
            table-layout: fixed;
        }

        .approval-table td {
            text-align: center;
            width: 33%;
        }

        .title-ttd {
            font-weight: bold;
            margin-bottom: 60px;
        }

        .name {
            text-decoration: underline;
        }

        /* BIAR TANDA TANGAN TIDAK KE HALAMAN BARU SENDIRI */
        .approval {
            page-break-inside: avoid;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <img src="{{ public_path('assets/img/logo/logoheader.jpg') }}">
        <p>Jl. M. Toha No. 266, Bandung 40243 Telp. 022-5200269 Fax 022-5210699</p>
        <p>Telp: 022-5200269 | Email: sinarterang266@gmail.com</p>
    </div>

    <div class="content">

        <div class="title">
            FORMULIR PENGAJUAN SERVICE KENDARAAN
        </div>

        <!-- DATA -->
        <table class="table">
            <tr>
                <td width="38%">Nama Karyawan</td>
                <td width="2%">:</td>
                <td>{{ $kendaraan->userPengajuan->name ?? '' }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>{{ $kendaraan->userPengajuan->jabatan->name ?? '' }}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>:</td>
                <td>{{ $kendaraan->userPengajuan->department->name ?? '' }}</td>
            </tr>
            <tr>
                <td>Tanggal Pengajuan</td>
                <td>:</td>
                <td>{{ $kendaraan->tanggal_pengajuan->format('d/m/Y') ?? '' }}</td>
            </tr>
        </table>

        <p style="margin-top:15px;"><b>Detail Kendaraan:</b></p>

        <table class="table">
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
            <tr>
                <td width="2%">1.</td>
                <td width="36%" class="names">Nama Kendaraan</td>
                <td width="2%">:</td>
                <td>{{ ucwords($kendaraan->aset->nama_aset) ?? '' }}</td>
            </tr>
            <tr>
                <td>2.</td>
                <td class="names">Deskripsi Service</td>
                <td>:</td>
                <td>{{ ucwords($kendaraan->deskripsi_service) ?? '' }}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td class="names">Alasan</td>
                <td>:</td>
                <td>{{ ucwords($kendaraan->alasan_service) ?? '' }}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td class="names">KM Sekarang</td>
                <td>:</td>
                <td>{{ $kendaraan->kilometer_awal ?? '' }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td class="names">No Polisi</td>
                <td>:</td>
                <td>{{ Str::upper($kendaraan->aset->no_polisi) ?? '' }}</td>
            </tr>
        </table>

        <p style="margin-top:15px;"><b>Detail Item:</b></p>

        <table class="tableItem">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Keterangan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kendaraan->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords($item->nama_item) }}</td>
                        <td>{{ ucwords($item->keterangan) }}</td>
                        <td style="text-align:center">{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada item</td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:center"><b>Total</b></td>
                    <td>
                        <b>
                            Rp {{ number_format($kendaraan->items->sum('subtotal'), 0, ',', '.') }}
                        </b>
                    </td>
                </tr>
            </tfoot>
        </table>

        <!-- APPROVAL -->
        <div class="approval">
            <table class="approval-table">
                <tr>
                    <td>
                        <div class="title-ttd">Mengetahui HRD / GA</div>
                        <div class="name">(Widi)</div>
                        <div>Tanggal: 11/04/2026</div>
                    </td>
                    <td>
                        <div class="title-ttd">Disetujui Direktur</div>
                        <div class="name">(Agus Setiawan)</div>
                        <div>Tanggal: 11/04/2026</div>
                    </td>
                    <td>
                        <div class="title-ttd">Finance</div>
                        <div class="name">(Hanna)</div>
                        <div>Tanggal: 11/04/2026</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="page-break">
            <p style="margin-top:50px;"><b>Dokumen Pendukung :</b></p>
            <div class="img">
                @if (!empty($kendaraan->foto1))
                    <img src="{{ public_path('storage/' . $kendaraan->foto1) }}"
                        style="margin-bottom: 20px; max-height: 300px;" width="100%">
                @endif
                <br>
                @if (!empty($kendaraan->foto2))
                    <img src="{{ public_path('storage/' . $kendaraan->foto2) }}"
                        style="margin-bottom: 20px; max-height: 300px;" width="100%">
                @endif
            </div>
        </div>

        <div class="page-break">
            <p style="margin-top:50px;">Daftar harga dari pemasok</p>
            <table class="table">
                <tr>
                    <td width="2%">-</td>
                    <td width="36%" class="names">Spesifikasi teknis Service/ penggantian spare part</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td class="names">Penawaran dari vendor (jika ada)</td>
                </tr>
                <tr>
                    <td>-</td>
                    <td class="names">Justifikasi kebutuhan</td>
                </tr>
            </table>

            <p style="margin-top: 30px;"># Instruksi Pengisian :</p>
            <table width="100%">
                <tr>
                    <td width="2%">1.</td>
                    <td width="98%" class="names" style="text-align:justify; font-size:14px; line-height: 1.5;">Isi
                        semua kolom yang
                        tersedia dengan informasi yang akurat dan lengkap</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td class="names" style="text-align:justify; font-size:14px; line-height: 1.6;">Pastikan alasan
                        permintaan alat dijelaskan dengan jelas untuk mendukung persetujuan.</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td class="names" style="text-align:justify; font-size:14px; line-height: 1.6;">Lampirkan dokumen
                        pendukung yang diperlukan untuk memvalidasi permintaan.</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td class="names" style="text-align:justify; font-size:14px; line-height: 1.6;">Serahkan formulir
                        ini kepada manajer departemen untuk proses persetujuan awal.
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td class="names" style="text-align:justify; font-size:14px; line-height: 1.6;">Setelah disetujui
                        oleh manajer departemen, formulir akan diteruskan ke bagian Finance/ akunting untuk persetujuan
                        keuangan yang nanti akan dilanjutkan ke bagian pengadaan untuk evaluasi lebih lanjut.</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td class="names" style="text-align:justify; font-size:14px; line-height: 1.6;">Setelah semua
                        persetujuan diperoleh, penggantian/ service akan d acc dan d proses sesuai prosedur yang
                        berlaku.</td>
                </tr>
            </table>


            <p style="margin-top: 70px;">Catatan :</p>
            <p style="text-align: justify; line-height: 1.5;">Pengajuan permintaan penggantian/service harus sesuai
                dengan kebijakan dan prosedur yang berlaku di perusahaan. Penyalahgunaan atau informasi yang tidak
                akurat dapat berakibat pada tindakan disiplin.</p>
        </div>


    </div>

</body>

</html>
