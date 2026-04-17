<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Pengajuan Service</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            background: #eee;
        }

        /* KERTAS A4 */
        .page {
            width: 21cm;
            min-height: 29.7cm;
            margin: auto;
            background: white;
            padding: 2cm 2cm 1cm 2cm;
            box-sizing: border-box;
        }

        /* HEADER */
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
        }

        .header img {
            padding-bottom: 5px;
            width: 50%;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* TITLE */
        .title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        /* TABEL UMUM */
        table {
            border-collapse: collapse;
            table-layout: fixed;
        }

        .tableItem {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        .tableItem th {
            font-size: 14px;
            text-align: left;
        }

        .tableItem th,
        .tableItem td {
            border: 1px solid black;
            padding: 6px;
        }

        /* TABLE CONTENT */
        .table {
            width: 70%;
        }

        td {
            padding: 6px 4px;
            vertical-align: top;
        }



        .approval {
            width: 100%;
            margin-top: 60px;
            text-align: center;
        }

        .approval-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .approval-table td {
            width: 33.33%;
            vertical-align: top;
            padding: 10px;
        }

        .box {
            min-height: 150px;
        }

        .approval-table .title {
            font-weight: bold;
            margin-bottom: 80px;
        }

        .name {
            margin-top: 10px;
            text-decoration: underline;
        }

        .date {
            margin-top: 5px;
        }





        /* PRINT SETTING */
        @page {
            size: A4;
            margin: 0.5cm 1.5cm 1cm 1.5cm;
        }

        @media print {
            body {
                background: none;
                margin: 0;
            }

            .page {
                margin: 0.5cm 1.5cm 1cm 1.5cm;
                width: auto;
                min-height: auto;
                box-shadow: none;
                padding: 0;
                page-break-after: always;
            }

            .header {
                position: sticky;
                top: 0;
            }

        }
    </style>
</head>

<body>

    <div class="page">

        <div class="header">
            <img src="{{ asset('assets/img/logo/logoheader.jpg') }}">
            <p>Jl. M. Toha No. 266, Bandung 40243 Telp. 022-5200269 Fax 022-5210699</p>
            <p>Telp: 022-5200269 | Email: sinarterang266@gmail.com</p>
        </div>

        <div class="content">
            <!-- TITLE -->
            <div class="title">
                FORMULIR PENGAJUAN SERVICE KENDARAAN
            </div>

            <!-- DATA PEMOHON -->
            <table class="table">
                <tr>
                    <td width="40%">Nama Karyawan</td>
                    <td width="2%">:</td>
                    <td width="58%">Astri</td>
                </tr>
                <tr>
                    <td width="40%">Jabatan</td>
                    <td>:</td>
                    <td>Caretacker</td>
                </tr>
                <tr>
                    <td width="40%">Departemen</td>
                    <td>:</td>
                    <td>Logistik</td>
                </tr>
                <tr>
                    <td width="40%">Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>11/04/2026</td>
                </tr>
            </table>

            <p style="font-size:12px; font-weight:bold; margin-top:20px;">
                Detail Kendaraan:
            </p>

            <!-- DETAIL -->
            <table class="table">
                <tr>
                    <td width="2%">1.</td>
                    <td width="38%">Nama Kendaraan</td>
                    <td width="2%">:</td>
                    <td width="58%">Toyota Avanza</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Deskripsi Service</td>
                    <td>:</td>
                    <td>Ganti Oli dan Tune Up</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Alasan</td>
                    <td>:</td>
                    <td>Sudah waktunya ganti oli</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>KM Sekarang</td>
                    <td>:</td>
                    <td>65628</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>No Polisi</td>
                    <td>:</td>
                    <td>D 8937 FT</td>
                </tr>
            </table>

            <p style="font-size:12px; font-weight:bold; margin-top:20px;">
                Detail Item :
            </p>

            <!-- DETAIL -->
            <table class="tableItem">
                <tr>
                    <th width="2%">No</th>
                    <th>Nama Item</th>
                    <th>Keterangan</th>
                    <th width="5%">Qty</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Oli semi synthetic</td>
                    <td>Oli Enduro</td>
                    <td>1</td>
                    <td>Rp. 450.000</td>
                    <td>Rp. 450.000</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Tune Up</td>
                    <td>Tune Up</td>
                    <td>1</td>
                    <td>Rp. 600.000</td>
                    <td>Rp. 600.000</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bol">Total</td>
                    <td>Rp. 1.050.000</td>
                </tr>
            </table>

            <div class="approval">
                <table class="approval-table">
                    <tr>

                        <!-- HRD / GA -->
                        <td>
                            <div class="box">
                                <div class="title">Mengetahui HRD / GA</div>

                                <div class="name">(Widi)</div>
                                <div class="date">Tanggal: 11/04/2026</div>
                            </div>
                        </td>

                        <!-- DIREKTUR -->
                        <td>
                            <div class="box">
                                <div class="title">Disetujui Direktur</div>

                                <div class="name">(Agus Setiawan)</div>
                                <div class="date">Tanggal: 11/04/2026</div>
                            </div>
                        </td>

                        <!-- FINANCE -->
                        <td>
                            <div class="box">
                                <div class="title">Finance</div>

                                <div class="name">(Hanna)</div>
                                <div class="date">Tanggal: 11/04/2026</div>
                            </div>
                        </td>

                    </tr>
                </table>
            </div>

        </div>

    </div>

</body>

</html>
