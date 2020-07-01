<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        // Cek apakah terdapat session dengan nama authenticated
        if( ! $this->session->userdata('authenticated')){ // Jika tidak ada
            redirect('login'); // Redirect ke halaman login
        }
    }

    public function tgl_indo($tgl){
	  	if(substr($tgl,5,1)==0){
		  	$bl=substr($tgl,6,1);
	  	}else{
		  	$bl=substr($tgl,5,2);
	  	}
	  	$tanggal = substr($tgl,8,2);
	  	$bulan    = $this->getBulan($bl);
	  	$tahun    = substr($tgl,0,4);
	  	
	  	return "$tanggal $bulan $tahun";
	}

	public function getBulan($bln){
	  	$bulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
	  	$x = $bulan[$bln];
	  	
	  	return $x;
	}

	public function getRomawiBulan($bln){
	    if(substr($bln,0,1)==0){
		    $bln=substr($bln,1,1);
	    }else{
		    $bln=substr($bln,0,2);
	    }
	  	$bulan = [1=>'I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
	  	$x = $bulan[$bln];
	  	
	  	return $x;
	}

	//konversi tanggal database ke bulan indo
	public function bln_indo($tgl){
	  if(substr($tgl,5,1)==0){
		  $bl=substr($tgl,6,1);
	  }else{
		  $bl=substr($tgl,5,2);
	  }
	  
	  $bulan    = $this->getBulan($bl);
	  return "$bulan";        
	}


	public function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	public function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}
}