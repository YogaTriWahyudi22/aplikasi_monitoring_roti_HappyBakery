<?php
include '../koneksi.php';
$id = $_POST['id_rasa'];
$user = $_POST['varian_rasa'];

$query = mysqli_query($koneksi, "UPDATE varian_rasa SET varian_rasa='$user' where id_rasa ='$id' ");
echo mysqli_error($koneksi);

if ($query) {
    echo "<script>
        alert('data berhasil di Edit!');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
        alert('data Bermasalah !');
        document.location.href = 'edit.php';
        </script>";
}
