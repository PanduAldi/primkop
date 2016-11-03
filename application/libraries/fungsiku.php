<?php

class Fungsiku {
	
	function gen_ojek_code($table, $column, $kdkel, $propinsi, $kota, $kecamatan, $kelurahan){
		$this->CI =& get_instance();
		$db2 = $this->CI->load->database('db2',TRUE);

		if(empty($table) && empty($column)){
			echo "Generate Code failure!. Table or Column is missing.";
		}else{

			$db2->select("RIGHT(".$table.".".$column.",4) AS kode", FALSE);
			$db2->where('kelurahan', $kdkel);
			$db2->limit(1);
			$db2->order_by('id', 'DESC');

			$query = $db2->get($table);


			if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = (int)$data->kode + 1;
			}else{
			$kode = 1;
			}

			$kodemax = str_pad($kode,4,"0", STR_PAD_LEFT);


			$kode = $propinsi."".$kota."".$kecamatan."".$kelurahan."".$kodemax;

			return $kode;
		}
	}


	function activation_code($str, $len=4)
  {
    if( !is_string($str) || (strlen($str) == 0) )
    { 
      return $str; 
    } 
  
    
    $ret = ''; 
    $len = ( intval($len) >= 4 ) ? intval($len) : 4; 
    $block = array(); 
  
    for( $i=0; $i<$len; $i++ ) 
    { 
      $block[] = 0; 
    } 
  
    $table = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'; 
  
    $tblen = strlen($table); 
    for( $i=0, $l=strlen($str); $i<$l; $i++ ) 
    { 
      $idx = $i % $len; 
      $chr = ord(substr($str, $i, 1)); 
      $block[$idx] = ($block[$idx] + $chr) % $tblen; 
      unset($idx, $chr); 
    
    } 
  
    for( $i=0; $i<$len; $i++ ) 
    { 
      $ret .= substr($table, $block[$i], 1); 
    
     } 
  
    unset($block, $table, $tblen);
    return $ret;
  }	

//end of class	
}