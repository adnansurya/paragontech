<?php
    include("../koneksi.php");



    if($_POST['id_inventory']) {
        $id = $_POST['id_inventory'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $query =mysqli_query($koneksi,"SELECT * FROM tbl_inventory WHERE id_inventory = $id");
        foreach ($query as $baris) {

          $id_vendor = $baris['id_vendor'];
          $id_warehouse = $baris['id_warehouse'];
          $id_brand = $baris['id_brand'];
          $id_fixture = $baris['id_fixture'];
          $id_tipe = $baris['id_tipe'];
          $id_detail = $baris['id_detail'];
          $id_status = $baris['id_status'];




          $result = mysqli_query($koneksi, "SELECT * from tbl_vendor WHERE id_vendor='$id_vendor'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_vendor = $row['nama_vendor'];
          }

          $result = mysqli_query($koneksi, "SELECT * from tbl_warehouse WHERE id_warehouse='$id_warehouse'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_warehouse = $row['nama_warehouse'];
          }

          $result = mysqli_query($koneksi, "SELECT * from tbl_brand WHERE id_brand='$id_brand'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_brand = $row['nama_brand'];
          }

          $result = mysqli_query($koneksi, "SELECT * from tbl_fixture WHERE id_fixture='$id_fixture'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_fixture = $row['nama_fixture'];
          }

          $result = mysqli_query($koneksi, "SELECT * from tbl_tipe WHERE id_tipe='$id_tipe'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_tipe = $row['nama_tipe'];
          }


          $result = mysqli_query($koneksi, "SELECT * from tbl_detail WHERE id_detail='$id_detail'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_detail = $row['nama_detail'];
          }

          $result = mysqli_query($koneksi, "SELECT * from tbl_status WHERE id_status='$id_status'");
          if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_assoc($result);
            $nama_status = $row['nama_status'];
          }





?>
        <form action="inventory/update.php" method="post">
              <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id_inventory" value="<?php echo $baris['id_inventory']; ?>">
          

            <div class="form-group">
              <label>Vendor</label>
              <p><?php echo $nama_vendor; ?></p>
            </div>
            <div class="form-group">
              <label>Warehouse</label>
              <p><?php echo $nama_warehouse; ?></p>
            </div>
            <div class="form-group">
              <label>Brand</label>
              <p><?php echo $nama_brand; ?></p>
            </div>
            <div class="form-group">
              <label>Fixture</label>
              <p><?php echo $nama_fixture; ?></p>
            </div>
            <div class="form-group">
              <label>Tipe</label>
              <p><?php echo $nama_tipe; ?></p>
            </div>
            <div class="form-group">
              <label>Detail</label>
              <p><?php echo $nama_detail; ?></p>
            </div>
            <div class="form-group">
                <label>Running Number</label>
                <p><?php echo $baris['running_number']; ?></p>
            </div>
            <div class="form-group">
              <label>Tahun Produksi</label>
              <p><?php echo $baris['thn_produksi']; ?></p>
            </div>
            <div class="form-group">
              <label>Tahun Demolish</label>
              <p><?php echo $baris['thn_demolish']; ?></p>
            </div>
            <div class="form-group">
              <label>Status</label>
              <p><?php echo $nama_status; ?></p>
            </div>

              <button class="btn btn-danger  btn-block" type="submit">Hapus</button>
        </form>



        <?php
      }
    }

?>
