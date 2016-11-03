<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idn_times
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function jam_db($jam)
	{
		$jam = substr($jam, 11, 2);
		$detik = substr($jam, 14, 2); 
	
		return $jam.":".$detik;
	}

	public function tgl_db($tgl)
	{
		$tanggal = substr($tgl, 8,2);
		$bulan 	 = $this->set_bulan(substr($tgl, 5,2));
		$tahun 	 = substr($tgl, 0,4);

		return $tanggal." ".$bulan." ".$tahun;
	}

	// Set bulan 
	public function set_bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;

			case 2:
				return "Februari";
				break;

			case 3:
				return "Maret";
				break;

			case 4:
				return "April";
				break;

			case 5:
				return "Mei";
				break;

			case 6:
				return "Juni";
				break;

			case 7:
				return "Juli";
				break;

			case 8:
				return "Agustus";
				break;

			case 9:
				return "September";
				break;

			case 10:
				return "Oktober";
				break;

			case 11:
				return "November";
				break;

			case 12:
				return "Desember";
				break;
		}
	}


	public function hari_indo($date)
	{
		$hari = array(
				'Minggu',
				'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu'
				);

		return $hari[date('w', strtotime($date))];
	}

}

/* End of file indonesian_times.php */
/* Location: ./application/libraries/indonesian_times.php */
