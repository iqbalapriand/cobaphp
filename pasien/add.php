<?php include_once('../_header.php'); ?>

     <div class="box">
         <h1>Pasien</h1>
         <h4>
            <small>Tambah Data Pasien</small>
            <div class="pull-right">
              <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
         </h4>
         <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label form="identitas">Nomor Identitas</label>
                        <input type="number" name="identitas" id="identitas" class="form-control" required autofocus>
                   </div>
                   <div class="form-group">
                        <label form="nama">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                   </div>
                    <div class="form-group">
                        <label form="jk">Jenis Kelamin</label>
                        <div>
                          <label class="radio-inline">
                             <input type="radio" name="jk" id="jk" value="L" required> Laki-Laki
                          </label>
                          <label class="radio-inline">
                             <input type="radio" name="jk" value="P" required> Perempuan
                          </label>
                        </div>
                   </div>
                   <div class="form-group">
                        <label form="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                   </div>
                   <div class="form-group">
                        <label form="telp">No. Telepon</label>
                        <input type="number" name="telp" id="telp" class="form-control" required autofocus>
                   </div>
                   <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                   </div>   
                </form>
            </div>
         </div>
     </div>

<?php include_once('../_footer.php'); ?>