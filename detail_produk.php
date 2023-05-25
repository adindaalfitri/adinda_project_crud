<?php 
include('koneksi.php'); 

$id = $_GET['id'];
        $query = "SELECT * FROM produk where id = '$id'";
        $result = mysqli_query($koneksi, $query);
        if(!$result) {
            die("Query Error:".mysqli_errno($koneksi). ".".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);


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
        a{
        cursor: pointer;
        }
    button{
        cursor: pointer;
    }
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
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
        p {
            border-radius: 5px;
            border: 2px solid grey;
            padding: 5px;
            background-color: white;
            margin: 5px;
        }
        p:hover {
            border: 2px solid purple;
            border-radius: 5px;
            /* outline-color: purple; */
        }
        b {
            color: purple;
        }
    </style>
</head>
<body>
    <center><h1>Detail Produk</h1></center>
        <section class="base">
        <div>
            <b>Nama Produk</b>
            <p><?= $data['nama_produk']?></p>
        </div>
        <div>
            <b>Deskripsi</b>
            <p><?= $data['deskripsi']?></p>
        </div>
        <div>
            <b>Harga Beli</b>
            <p><?= $data['harga_beli']?></p>
        </div>
        <div>
            <b>Harga Jual</b>
            <p><?= $data['harga_jual']?></p>
        </div>
        <div style= "display: flex; flex-direction: column;">
            <b>Gambar Produk</b>
            <br>
            <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px">
            <a href="index.php"><button type="submit">Back</button></a>
        </div>
        </section>

</body>
</html>