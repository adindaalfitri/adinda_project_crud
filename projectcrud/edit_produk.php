<?php include('koneksi.php'); 

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM produk where id = '$id'";
        $result = mysqli_query($koneksi, $query);
        if(!$result) {
            die("Query Error:".mysqli_errno($koneksi). ".".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);

        if(!count($data)) {
            echo "<script>alert('Data tidak ditemukan pada tabel.');window.location='index.php';</script>";
        }

    } else {
        echo "<script>alert('Masukkan ID yang ingin di edit');window.location='index.php';</script>";
    }


?>
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
    <center><h1>Edit Produk <?php echo $data['nama_produk']; ?></h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <b><label>Nama Produk</label><b>
            <input type="text" name="nama_produk" autofocus="" required="" value="<?php echo $data['nama_produk']; ?>" />
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        </div>
        <div>
            <b><label>Deskripsi</label><b>
            <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        <div>
            <b><label>Harga Beli</label><b>
            <input type="text" name="harga_beli" required="" value="<?php echo $data['harga_beli']; ?>" />
        </div>
        <div>
            <b><label>Harga Jual</label><b>
            <input type="text" name="harga_jual" required="" value="<?php echo $data['harga_jual']; ?>" />
        </div>
        <div>
            <b><label>Gambar Produk</label>
            <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px">
            <input type="file" name="gambar_produk" />
            <i style="float: left;font-size: 11px;color: red;">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
            <br>
            <button type="submit">Simpan Perubahan</button>
</body>
</html>