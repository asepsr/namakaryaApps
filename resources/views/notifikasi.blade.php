<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notify</title>
    <style>
        body {
            background-color: #bdc3c7;
            margin: 0;
        }

        .garis {
            width: 75%;
        }
    </style>
</head>

<body>
    <div class="card">
        <h3><b>Pengajuan Slik Atas Nama</b></h3>
        Tanggal pengajuan : {{ date('d-m-Y') }}
        <hr>
        <br>
        <table class="table">
            <tbody>
                <tr>
                    <td>NAMA</td>
                    <td>:</td>
                    <td>{{ $debitur->name }}</td>
                </tr>
                <tr>
                    <td>NOMOR KTP</td>
                    <td>:</td>
                    <td>{{ $debitur->noKtp }}</td>
                </tr>
                <tr>
                    <td>PLAFOND</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($debitur->plafond) }}</td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td>:</td>
                    <td>{{ $debitur->alamat }}</td>
                </tr>
            </tbody>
        </table>

        Hormat Kami,
        <br>
        <b>Koperasi Namastra Jaya Sejahtera</b>
        <br>
        Tlp (0251) 858 688
        <br>
        Jl. Kolonel Achmad Syam No. 179C Tanah Baru, Bogor Utara
    </div>
</body>

</html>
