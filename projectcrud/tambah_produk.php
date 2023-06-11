<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD ADINDA</title>
    <style type="text/css">
         @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        h1 {
            text-transform: uppercase;
            color: purple;
        }
        .base {
            width: 400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ededed;
        }
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
            color: purple;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: purple;
        }
        b {
            outline-color: purple;
        }
        button {
            background: -webkit-linear-gradient(left, #a445b2, #fa4299);
            color: #fff;
            padding: 10px;
            font-size: 13px;
            border: 0;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <center><h1>Tambah Produk</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <b><label>Nama Produk</label><b>
            <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
            <b><label>Deskripsi</label><b>
            <input type="text" name="deskripsi" />
        </div>
        <div>
            <b><label>Harga Beli</label><b>
            <input type="text" name="harga_beli" required="" />
        </div>
        <div>
            <b><label>Harga Jual</label><b>
            <input type="text" name="harga_jual" required="" />
        </div>
        <div>
            <b><label>Gambar Produk</label><b>
            <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
            <button type="submit">Simpan Produk</button>
</body>
</html>