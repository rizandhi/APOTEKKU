<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Apotek Anugerah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;

            /* padding: 20px; */

            display: flex;
            flex-direction: column;
            min-height: 100vh;

            padding: 0;
        }



        .header {
            text-align: center;
            margin-bottom: 1pt;
            border-bottom: 2px solid black;
            /* Garis tebal di bagian atas */
            /* padding-top: 10px; */
        }

        .border-line {
            margin: 0;
            border-bottom: 1px solid black;
            /* Garis tipis di bagian bawah header */
            /* padding-bottom: 10px; */
        }

        .alamat {
            padding-top: 10px;
            text-align: center;
            margin-bottom: 10px;
        }

        .kontak {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            flex: 1;
            margin: 3cm;
            /* Top, Right, Bottom, Left */
            /* Set style for your content container */
        }

        .table-container {
            margin-top: 20px;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        .uang {
            text-align: right;
        }

        .footer {
            text-align: center;
            padding: 20px;
        }

        .no-border-right {
            border-right: none;
            border-left: none;
        }
        <style>
    /* Hindari wrapping dan batasi overflow pada teks */
    .no-wrap {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; /* Jika ingin menampilkan elipsis pada teks yang terpotong */
    }

    /* Menyesuaikan lebar kolom tabel dengan kontennya */
    .auto-table {
        table-layout: auto;
        width: 100%; /* Jangan lupa tentukan lebar tabel secara eksplisit */
    }
</style>
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <h1><strong>Laporan Pengeluaran</strong></h1>

        </div>



        <div class="border-line"></div> <!-- Garis tipis di bagian bawah header -->
        <div class="alamat">
            <h5 class="py-0 my-0"><strong>Apotek Anugerah Farma</strong></h5>
            <p class="py-0 my-0">Alamat: Jl. Palopo, Palopo</p>
            <p class="py-0 my-0">Kontak: 08114488394</p>
        </div>
        <div class="table-container">
            <table class="table table-bordered auto-table">
                <thead>
                    <tr style="text-align: center">
                        <th class=" no-border-right" scope="col">No</th>
                        {{-- <th class=" no-border-right" scope="col">Tanggal Pembelian</th> --}}
                        <th class=" no-border-right" scope="col">Nama Obat</th>
                        <th class=" no-border-right" scope="col">Suplier</th>
                        <th class=" no-border-right" scope="col">Agen</th>
                        <th class=" no-border-right" scope="col">Jumlah</th>
                        <th class=" no-border-right" colspan="2" scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalPenjualan as $item)
                        <tr style="text-align: center">
                            <th class=" no-border-right" scope="row">{{ $loop->iteration }}</th>
                            {{-- <td class=" no-border-right">{{ $item->obat-> }}</td> --}}
                            <td class=" no-border-right no-wrap">{{ $item->obat->nama_obat }}</td>
                            <td class=" no-border-right no-wrap">{{ $item->obat->suplier->nama_suplier }}</td>
                            <td class=" no-border-right no-wrap">{{ $item->obat->suplier->nama_agen}}</td>
                            
                            <td class=" no-border-right">{{ $item->jumlah }}</td>
                            <td class=" no-border-right">Rp. </td>
                            <td class="uang no-border-right">{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="total">
            <p><strong>Total Pengeluaran: Rp. {{ number_format($totalSeluruhPendapatan, 0, ',', '.') }}</strong></p>
        </div>

    </div>
    <div class="footer">
        <p class="py-0 my-0">Tanggal Cetak: {{ date('d F Y') }}</p>
        <p class="py-0 my-0">Apotek Anugerah Farma - Terima Kasih</p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
