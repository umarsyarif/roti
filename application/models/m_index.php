<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_index extends CI_Model 
{
	
	function lihat_data_kontak()
	{
		$status = "Ya";
		return $this->db->get_where('kontak', array('status'=>$status))->result();	
	}

	function lihat_data_profil()
	{
		$status = "Ya";
		return $this->db->get_where('profil', array('status'=>$status))->result();	
	}

	function lihat_data_sertifikat()
	{
		return $this->db->get('sertifikat')->result();				
	}

	function lihat_data_galeri()
	{
		return $this->db->get('galeri')->result();	
	}

	function lihat_data_produk()
	{

		return $this->db->get('produk')->result();
	}

	function lihat_data_layanan()
	{
		$status = "Ya";
		return $this->db->get_where('layanan', array('status'=>$status))->row();	
	}
}
?>