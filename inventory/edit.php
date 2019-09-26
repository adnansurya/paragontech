<?php
    include("../koneksi.php");


    if($_POST['id_inventory']) {
        $id = $_POST['id_inventory'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $query = mysqli_query($koneksi,"SELECT * FROM tbl_inventory WHERE id_inventory = $id");
        foreach ($query as $baris) { ?>


        <form action="inventory/update.php" method="post">
          <input type="hidden" name="action" value="edit">

            <input type="hidden" name="id_inventory" value="<?php echo $baris['id_inventory']; ?>">

            <div class="form-group">
              <label for="select_vendor">Vendor</label>
              <select id="select_vendor" name="vendor" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_vendor ORDER BY nama_vendor");
                      while ($row = mysqli_fetch_array($load)){
                          $id_vendor = $row['id_vendor'];
                          $nama_vendor = $row['nama_vendor'];
                          echo "<option data-nama='".$nama_vendor."' value='" . $id_vendor."'";
                          if($baris['id_vendor'] === $id_vendor){
                            echo " selected";
                          }
                          echo ">" . $nama_vendor . "</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select_warehouse">Warehouse</label>
              <select id="select_warehouse" name="warehouse" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_warehouse");
                      while ($row = mysqli_fetch_array($load)){
                          $id_warehouse = $row['id_warehouse'];
                          $nama_warehouse = $row['nama_warehouse'];
                          echo "<option data-nama='".$nama_warehouse."' value='" . $id_warehouse."'";
                          if($baris['id_warehouse'] === $id_warehouse){
                            echo " selected";
                          }
                          echo ">" . $nama_warehouse . "</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select_brand">Brand</label>
              <select id="select_brand" name="brand" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_brand");
                      while ($row = mysqli_fetch_array($load)){
                          $id_brand = $row['id_brand'];
                          $nama_brand = $row['nama_brand'];
                          $kode_brand = $row['kode_brand'];
                          echo "<option data-kode='".$kode_brand."' data-nama='".$nama_brand."' value='" . $id_brand."'";
                          if($baris['id_brand'] === $id_brand){
                            echo " selected";
                          }
                          echo ">" . $nama_brand . "</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select_fixture">Fixture</label>
              <select id="select_fixture" name="fixture" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_fixture");
                      while ($row = mysqli_fetch_array($load)){
                          $id_fixture = $row['id_fixture'];
                          $nama_fixture = $row['nama_fixture'];
                          $kode_fixture = $row['kode_fixture'];
                          echo "<option data-kode='".$kode_fixture."' data-nama='".$nama_fixture."' value='" . $id_fixture."'";
                          if($baris['id_fixture'] === $id_fixture){
                            echo " selected";
                          }
                          echo ">" . $nama_fixture . "</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select_tipe">Tipe</label>
              <select id="select_tipe" name="tipe" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_tipe");
                      while ($row = mysqli_fetch_array($load)){
                          $id_tipe = $row['id_tipe'];
                          $nama_tipe = $row['nama_tipe'];
                          $kode_tipe = $row['kode_tipe'];
                          echo "<option data-kode='".$kode_tipe."' data-nama='".$nama_tipe."' value='" . $id_tipe."'";
                          if($baris['id_tipe'] === $id_tipe){
                            echo " selected";
                          }
                          echo ">" . $nama_tipe . "</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select_detail">Detail</label>
              <select id="select_detail" name="detail" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_detail");
                      while ($row = mysqli_fetch_array($load)){
                          $id_detail = $row['id_detail'];
                          $nama_detail = $row['nama_detail'];
                          echo "<option data-nama='".$nama_detail."' value='" . $id_detail."'";
                          if($baris['id_detail'] === $id_detail){
                            echo " selected";
                          }
                          echo ">" . $nama_detail . "</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="form-group">
                <label for="runningTxt">Running Number</label>
              <input id="runningTxt" type="number" class="form-control" name="running_number" value="<?php echo $baris['running_number']; ?>">
            </div>
            <div class="form-group">
                <label for="thn_produksiTxt">Tahun Produksi</label>
              <input id="thn_produksiTxt" type="text" class="form-control" name="thn_produksi" value="<?php echo $baris['thn_produksi']; ?>">
            </div>
            <div class="form-group">
                <label for="thn_produksiTxt">Tahun Demolish</label>
              <input id="thn_demolishTxt" type="text" class="form-control" name="thn_demolish" value="<?php echo $baris['thn_demolish']; ?>">
            </div>
            <div class="form-group">
              <label for="select_status">Status</label>
              <select id="select_status" name="status" class="form-control">

                  <?php
                      $load = mysqli_query($koneksi, "SELECT * from tbl_status");
                      while ($row = mysqli_fetch_array($load)){
                          $id_status = $row['id_status'];
                          $nama_status = $row['nama_status'];
                          echo "<option data-nama='".$nama_status."' value='" . $id_status."'";
                          if($baris['id_status'] === $id_status){
                            echo " selected";
                          }
                          echo ">" . $nama_status . "</option>";
                      }
                  ?>
              </select>
            </div>
              <button class="btn btn-info  btn-block" type="submit">Update</button>
        </form>



        <?php
      }
    }

?>
