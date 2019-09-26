<?php
    include("../koneksi.php");
    function formatTgl($tanggal){
      $a = explode('-',$tanggal);
      $my_new_date = $a[2].'-'.$a[1].'-'.$a[0];
      return $my_new_date;
    }



    if($_POST['id_pinjam']) {
        $id = $_POST['id_pinjam'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $query =mysqli_query($koneksi,"SELECT * FROM tbl_pinjam WHERE id_pinjam = $id");
        foreach ($query as $baris) {

          $id_store = $baris['id_store'];



          $result = mysqli_query($koneksi, "SELECT * from tbl_store WHERE id_store='$id_store'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_store = $row['nama_store'];
          }

?>
        <form action="peminjaman/update.php" method="post">
              <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id_pinjam" value="<?php echo $baris['id_pinjam']; ?>">


            <div class="form-group">
              <label>Store</label>
              <p><?php echo $nama_store; ?></p>
            </div>

            <div class="form-group">
                <label>Tgl. Mulai</label>
                <p><?php echo formatTgl($baris['tgl_mulai']); ?></p>
            </div>
            <div class="form-group">
              <label>Tgl. Akhir</label>
              <p><?php echo formatTgl($baris['tgl_akhir']); ?></p>
            </div>
            <div class="form-group">
              <label>Status</label>
              <?php 
                if($baris['selesai'] == 0){
                    echo "  <p>Belum Dikembalikan</p>";
                } else if($baris['selesai'] == 1) {
                    echo "  <p>Selesai</p>";
                }
              ?>

            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <p><?php echo $baris['keterangan']; ?></p>
            </div>


              <button class="btn btn-danger  btn-block" type="submit">Hapus</button>
        </form>



        <?php
      }
    }

?>
