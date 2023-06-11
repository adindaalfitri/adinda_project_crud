<?php 

include('koneksi.php'); 
session_start();
// die;
if(!isset($_SESSION["is_login"])){
    header('Location: http://localhost/projectcrud/login.php');
}
if(isset($_POST['logout'])){
    unset($_SESSION['is_login']);
    header('Location: http://localhost/projectcrud/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD ADINDA</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        h1 {
            text-transform: uppercase;
            color: #880088;
        }
        table {
            border: 1px solid #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }
        table thead th {
            background-color: #dda0dd;
            border: 1px solid #ddeeee;
            color: purple;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }
        table tbody td {
            border: 1px solid #dda0dd;
            color: #333;
            padding: 10px;
            text-align: center;
        }
        a {
            background: -webkit-linear-gradient(left, #a445b2, #fa4299);
            color: white;
            padding: 10px;
            font-size: 15px;
            text-decoration: none;
        }
        .Logout {
            background: -webkit-linear-gradient(left, #a445b2, #fa4299);
            color: white;
            padding: 10px;
            font-size: 15px;
            text-decoration: none;
            border: none;
            transition: all 0.3s ease;
        }
        .border {
            border-radius: 5px;
            /* padding: 0; */
        }
    </style>
</head>
<body>
    <center><h1>Data Produk</h1></center>
    <!-- </center> -->
    <div class="table">
        <div class="footer" style="display:flex; justify-content: space-between; margin: 10px auto 10px auto; width: 70%;">
            <a class="border" href="tambah_produk.php">+ &nbsp; Tambah Produk</a>
        </div>
        <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM produk ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);

            if(!$result) {
                die("Query Error : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }
            $no = 1;
            
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_produk']; ?></td>
            <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
            <td>Rp <?php echo number_format($row['harga_beli'], 0,',','.'); ?></td>
            <td>Rp <?php echo number_format($row['harga_jual'], 0,',','.'); ?></td>
            <td><img style="width: 120px;" src="gambar/<?php echo $row['gambar_produk']; ?>"></td>
            <td>
                <div class="tede" style="width:200px; height:100%; display: flex; justify-content: space-evenly; ">
                <a class="border" style="height: 22px; width:24px;" href="detail_produk.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                <a class="border" style="height: 22px; width:24px;" href="edit_produk.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                <a class="border" style="height: 22px; width:24px;" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>
                </div>
            </td>

        </tr>
        <?php
            $no++;
        }
        ?>

</tbody>
</table>
        <div class="footer" style="display:flex; justify-content: end; margin: 10px auto 10px auto; width: 70%;">
            <form action="" method="post">
                <button class="Logout border" type="submit" name="logout" style="cursor:pointer;">Logout</button>
            </form>
        </div>
</div>
</body>
</html>