<div class="panel panel-info" data-animate="fadeInLeft">
	<div class="panel-heading">
		<i class="fa fa-edit"></i> Form Registrasi Anggota
	</div>
	<div class="panel-body">
		<div class="alert alert-success"><i class="fa fa-check"></i> Data Anda telah masuk di dalam database anggota Primkop Caraka Prima Sabha.</div>
		<p>Silahkan jawab pertanyaan berikut untuk melengkapi proses pendaftaran anggota. Perhatikan penulisan nama harus benar sesuai dengan ejaan.</p>
		<form action="" name="daftar" method="POST">
		      <?php
		       
		       if($jabatan == "anggota"){
		       ?>
		        
		        <p><b>1. Siapakah nama KORDES anda?</b></p>
		        <input type="text" class="form-control" id="isian1" name="kordes" required autofocus size="50" /><br>
		        
		        <p><b>2. Siapakah nama KORCAM anda?</b></p>
		        <input type="text" class="form-control" id="isian2" name="korcam" required size="50" />
		                
		        <?php
		        }elseif($jabatan == "kordes"){
		          
		          ?>
		          
		        <p><b>1. Siapakah nama KORCAM anda?</b></p>
		        <input type="text" class="form-control" id="isian1" name="korcam" required autofocus size="50"/><br>
		        
		        <p><b>2. Siapakah nama KORWIL anda?</b></p>
		        <input type="text" class="form-control" id="isian2" name="korwil" required size="50"/>
		          <?php
		        }elseif($jabatan == "korcam"){
		        
		          ?>
		          
		        <p><b>1. Siapakah nama KORWIL anda?</b></p>
		        <input type="text" class="form-control" id="isian1" name="korwil" required autofocus size="50"/><br>
		        
		        <p><b>2. Siapakah nama KORDA anda?</b></p>
		        <input type="text" class="form-control" id="isian2" name="korda" required size="50"/>
		          <?php        
		        }elseif($jabatan == "korwil"){
		          
		            ?>
		          
		          <p><b>1. Siapakah nama KORDA anda?</b></p>
		          <input type="text" class="form-control" id="isian1" name="korda" required autofocus size="50"/><br>
		          
		          <p><b>2. Siapakah nama KORPUS anda?</b></p>
		          <input type="text" class="form-control" id="isian2" name="korpus" required size="50"/>
		            <?php  
		          
		        }elseif($jabatan == "korda"){
		          ?>
		          
		       <p><b>1. Siapakah nama Bapak Koperasi Indonesia?</b></p>
		          <input type="text" class="form-control" id="isian1" name="bpkkop" required autofocus size="50"/><br>
		          
		          <p><b>2. Siapakah nama Guru Bangsa Indonesia?</b></p>
		          <input type="text" class="form-control" id="isian2" name="bpkbangsa" required size="50"/>
		          <?php  
			    }elseif($jabatan == "korpus"){
			    
			      ?>
			          <p><b>1. Siapakah nama Bapak Koperasi Indonesia?</b></p>
			          <input type="text" class="form-control" id="isian1" name="bpkkop" required autofocus class="textfield" size="50"/><br>
			          
			          <p><b>2. Siapakah nama Guru Bangsa Indonesia?</b></p>
			          <input type="text" class="form-control" id="isian2" name="bpkbangsa" required class="textfield" size="500"/>
			            <?php  
			      
			      }
			      else
			      {
			      	  echo "Silahkan registrasi terlebih dahulu ..!!!";
			      }
		    ?>

	        <hr>
	        <a href="<?php echo site_url('member/batalreg');?>" id="batal" class="btn btn_red" onclick="return confirm('Perhatian! Pembatalan proses registrasi akan menghapus data ini dari database secara permanen. Yakin akan membatalkan registrasi anggota?');"> Batal
	        </a>
	        
	        <button type="submit" id="submit" name="submit" class="btn btn_blue">
	           Lanjutkan &raquo;</i>
	        </button>
		</form>
	</div>
</div>