<?php

function tambah(){
    $con = connect_db();
    if (isset($_POST['simpan'])){
        //deklarasi variabel yang disubmit dari form
        $nama = $_POST['_nama'];
        $lokasi = $_POST['_lokasi'];

        if(empty($nama)){
            echo "Nama rak harus diisi";
        } elseif(empty($lokasi)){
            echo "Lokasi rak harus diisi";
        } else {
            $query = "SELECT * from tb_rak WHERE lokasi='$lokasi'";
            $result = execute_query($con, $query);
            if(mysqli_num_rows($result) !=0){
                echo "Rak $lokasi dengan nama $nama sudah ada";
            } else {
                $queri = "INSERT INTO tb_rak (nama, lokasi) VALUES ('$nama','$lokasi')";
                $result = execute_query($con, $queri);
                if (mysqli_affected_rows($con) !=0){
                    $_SESSION["suksestambah"] = "Berhasil Menambah Data";
                    echo "
                        <script>
                            window.location.href='index.php';
                        </script>
                    ";;
                }
            }
        }
    }
}

function caridata($keyword){
    if (isset($_POST['_caridata'])) {
        $con = connect_db();
        $no = 1;
        $search = $_POST['_caridata'];

        // var_dump($search); exit();

        $query = mysqli_query($con, "SELECT * FROM tb_rak WHERE lokasi LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)) {
            echo `
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->lokasi; ?></td>
                    <td>
                        <a href="detail.php?buku= $row->lokasi" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" title="Lihat data $row->kode_buku">
                            <i class="mdi mdi-account-card-details"></i></a>
                        <a href="edit.php?buku=<?= $row->lokasi" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" title="Edit data $row->kode_buku">
                            <i class="mdi mdi-pencil-box"></i></a>
                        <a href="hapus.php?buku=$row->lokasi" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" title="Hapus data $row->kode_buku">
                            <i class="mdi mdi-delete-forever"></i></a>
                    </td>
                </tr>
            `;
        }
    }
}
?>