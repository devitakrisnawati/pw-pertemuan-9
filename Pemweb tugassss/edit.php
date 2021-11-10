<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		
		if(isset($_GET['Nim'])){

			$Nim = $_GET['Nim'];

			
			$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nim='$Nim'") or die(mysqli_error($koneksi));

			
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			
			}else{
				
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		
		if(isset($_POST['submit'])){
			$Nama_Mhs			  = $_POST['Nama_Mhs'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
			$Program_Studi	= $_POST['Program_Studi'];

			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET Nama_Mhs='$Nama_Mhs', Jenis_Kelamin='$Jenis_Kelamin', Program_Studi='$Program_Studi' WHERE Nim='$Nim'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_mhs&Nim=<?php echo $Nim; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nim" class="form-control" size="4" value="<?php echo $data['Nim']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Mhs" class="form-control" value="<?php echo $data['Nama_Mhs']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" <?php if($data['Jenis_Kelamin'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" <?php if($data['Jenis_Kelamin'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
						<option value="Sistem Informasi Kelautan" <?php if($data['Program_Studi'] == 'Sistem Informasi Kelautan'){ echo 'selected'; } ?>>Sistem Informasi Kelautan</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
