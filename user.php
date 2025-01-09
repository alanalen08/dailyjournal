<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah User
    </button>
    <div class="row">
        <!-- Untuk dynamic web user_data-->
        <div class="table-responsive" id="article_data">
            
        </div>
        <!-- Awal Modal Tambah-->
        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Form Tambah User-->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username disini" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password disini" required>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Foto profil</label>
                                <input type="file" class="form-control" name="fotoprofil">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah-->
    </div>
</div>
<script>
$(document).ready(function(){
		load_data();
		function load_data(hlm){
				$.ajax({
						url : "user_data.php",
						method : "POST",
						data : {hlm:hlm},
						success : function(data){
						$('#article_data').html(data);
						}
				})
		}
		$(document).on('click', '.halaman', function(){
				var hlm = $(this).attr("id");
				load_data(hlm);
		});
});
</script>
<?php
include "upload_foto.php";

//jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_foto = $_FILES['fotoprofil']['name'];
    $foto = '';

    //upload gambar
    if ($nama_foto != '') {
        $cek_upload = upload_foto_profil($_FILES["fotoprofil"]);

        if ($cek_upload['status']) {
            $foto = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=user';
            </script>";
            die;
        }
    }else{
        $foto = 'default.png';
    }

    //penyimpanan data ke user
    $stmt = $conn->prepare("INSERT INTO user (username,password,foto)
                            VALUES (?,?,?)");
    $stmt->bind_param("sss", $username, md5($password), $foto);
    $simpan = $stmt->execute();

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=user';
        </script>";
    }

    $stmt->close();
    $conn->close();
}

//jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $username = $_POST['username'];
    $gambar = $_POST['foto'];

    if ($gambar != '' and $gambar != 'default.png') {
        //hapus file gambar
        unlink("user_photo_profile/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM user WHERE username =?");

    $stmt->bind_param("s", $username);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data user sukses');
            document.location='admin.php?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data user gagal');
            document.location='admin.php?page=user';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>