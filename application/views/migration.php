<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migration</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
<style>
    body {
        width: 100%;
        background-color: black;
        color: lime;
        height: 100vh;
        padding: 0px;
        margin: 0px;
        font-family: 'DM Mono', monospace;
    }

    .w-100 {
        width: 100%;
    }

    .w-25 {
        width: 25%;
        float: left;
    }

    .text-center {
        text-align: center;
    }

    .btn {
        width: fit-content;
        height: fit-content;
        padding: 10px;
        color: white;
        background-color: blue;
        border: 2px solid yellow;
    }
</style>

<body>
    <div class="w-100">
        <div class="text-center">
            <h1>====Migration KMI====</h1>
        </div>
        <div class="w-25 text-center">
            <h2>Pindah data</h2>
            <a class="btn" href="<?= base_url('Pindah_data') ?>">Migrate</a>
        </div>
        <div class="w-25 text-center">
            <h2>Pemindahan Dana</h2>
            <a class="btn" href="<?= base_url('Pemindahan_dana') ?>">Migrate</a>
        </div>
        <div class="w-25 text-center">
            <h2>PAID</h2>
            <a class="btn" href="<?= base_url('Paid') ?>">Migrate</a>
        </div>
        <div class="w-25 text-center">
            <h2>PAY</h2>
            <a class="btn" href="<?= base_url('Pay') ?>">Migrate</a>
        </div>
        <div class="w-25 text-center">
            <h2>PENAWARAN</h2>
            <a class="btn" href="<?= base_url('Penawaran') ?>">Migrate</a>
        </div>
    </div>
    <div style="border:solid 2px lime;padding:40px;margin-top: 15%">
        <div class="text-center">
            <h2>Catatan</h2>
        </div>
        <p>
            =>Migration pemindahan dana (done) <br>
            note :
            <br>
            <br>
            =>Migration Paid (done) <br>
            note : <br>
            kesesuaian meta (115 data) & tidak di migration. (ket:Data Tidak dalam Kategory Kesesuaian). data meta_key berisi data : _note & _no_faktur.
            <br>
            -data yang sudah ada tidak di insert(ket: Data Sudah Ada).
            <br>
            -data berhasil di insert(ket: Data Berhasil diInsert).
            <br>
            <br>
            =>Migration Pay <br>
            note : <br>
            -Kategori penyesuaian invoice_purchase tidak ada dalam sobad_post <br>
            -data var berisi = order (semua) <br>
            note : data dominan ke penyesuaian "order" <br>
            -data var non_order tidak ada <br>
            note : var order ada semua ID ada semua. <br>
            <br>
            <br>
            => MIgration Penawaran <br>
            -Data yang sudah ada tidak di insert <br>
            -Ketika program jalan sudah ada keterangan Data mana yang berhasil di insert dan data mana yang tidak berhasil di insert(data sudah ada). <br>
        </p>
    </div>
</body>

</html>