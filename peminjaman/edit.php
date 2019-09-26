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
        $query = mysqli_query($koneksi,"SELECT * FROM tbl_pinjam WHERE id_pinjam = $id");
        foreach ($query as $baris) { ?>


        <form action="peminjaman/update.php" method="post">
          <input type="hidden" name="action" value="edit">

            <input type="hidden" name="id_pinjam" value="<?php echo $baris['id_pinjam']; ?>">

            <div class="form-group">
              <label for="select_store">Store</label>
              <select id="select_store" name="store" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_store ORDER BY nama_store");
                      while ($row = mysqli_fetch_array($load)){
                          $id_store = $row['id_store'];
                          $nama_store = $row['nama_store'];
                          echo "<option data-nama='".$nama_store."' value='" . $id_store."'";
                          if($baris['id_store'] === $id_store){
                            echo " selected";
                          }
                          echo ">" . $nama_store . "</option>";
                      }
                  ?>
              </select>
            </div>

            <div class="form-group">
                <label for="tglMulaiTxt">Tgl. Mulai</label>
              <input id="tglMulaiTxt" type="text" class="form-control datepicker" placeholder="Masukkan Tanggal Awal Peminjaman" name="tgl_mulai" value="<?php echo formatTgl($baris['tgl_mulai']); ?>">
            </div>
            <div class="form-group">
                <label for="tglAkhirTxt">Tgl. Akhir</label>
              <input id="tglAkhirTxt" type="text" class="form-control datepicker" placeholder="Masukkan Tanggal Awal Peminjaman" name="tgl_akhir" value="<?php echo formatTgl($baris['tgl_akhir']); ?>">
            </div>
            <div class="form-group">
                <label for="keteranganTxt">Keterangan</label>

                <textarea id="keteranganTxt" placeholder="Masukkan informasi tambahan terkait dengan Peminjaman" name="keterangan" class="form-control" placeholder="textarea" rows="2"><?php echo $baris['keterangan']; ?></textarea>
            </div>

              <button class="btn btn-info  btn-block" type="submit">Update</button>
        </form>
        <script type="text/javascript">

        $( "#tglMulaiTxt" ).datepicker({
          dateFormat: "dd-mm-yy",
        });
        $( "#tglAkhirTxt" ).datepicker({
          dateFormat: "dd-mm-yy",

        });

        </script>



        <?php
      }
    }

?>
