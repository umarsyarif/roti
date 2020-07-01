<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MainModel extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
    }

    public function tampil_all(){
        $id_user = $_SESSION['id'];
        $tahun = date('Y');
        if($_SESSION['level']=='4'){
            $where = "a.id_customer=b.id_customer and a.id_order=c.id_order and YEAR(a.tgl_penjualan)='$tahun' and a.id_user='$id_user'";
        }else{
            $where = "a.id_customer=b.id_customer and a.id_order=c.id_order and YEAR(a.tgl_penjualan)='$tahun'";
        }

        $this->db->select('a.id_order, a.id_user, a.id_customer, a.tgl_penjualan, a.status, b.nm_customer, c.ppn, c.ongkos_kirim');
        $this->db->from('penjualan a, customer b, faktur c');
        $this->db->where($where);
        $this->db->order_by('a.tgl_penjualan DESC, a.waktu_penjualan DESC');
        $query = $this->db->get();
 
        return $query->result();
    }

    public function tampil_bulan($bln){
        $id_user = $_SESSION['id'];
        $tahun = date('Y');
        $bulan = $bln;
        if($_SESSION['level']=='4'){
            $where = "a.id_customer=b.id_customer and a.id_order=c.id_order and YEAR(a.tgl_penjualan)='$tahun' and MONTH(a.tgl_penjualan)='$bulan' and a.id_user='$id_user'";
        }else{
            $where = "a.id_customer=b.id_customer and a.id_order=c.id_order and YEAR(a.tgl_penjualan)='$tahun' and MONTH(a.tgl_penjualan)='$bulan'";
        }
        

        $this->db->select('a.id_order, a.id_user, a.id_customer, a.tgl_penjualan, a.status, b.nm_customer, c.ppn, c.ongkos_kirim');
        $this->db->from('penjualan a, customer b, faktur c');
        $this->db->where($where);
        $this->db->order_by('a.tgl_penjualan DESC, a.waktu_penjualan DESC');
        $query = $this->db->get();
 
        return $query->result();
    }

    public function tampil_order($id_order, $id_customer,$tgl_penjualan){
        $where   = "EXISTS(SELECT MAX(c.tgl_berlaku) FROM harga_produk c WHERE c.tgl_berlaku<='".$tgl_penjualan."' AND b.id_produk=c.id_produk HAVING MAX(c.tgl_berlaku)=e.tgl_berlaku) AND EXISTS(SELECT MAX(c.tgl_berlaku) FROM diskon_produk c WHERE c.tgl_berlaku<='".$tgl_penjualan."' and c.id_customer='$id_customer' AND d.id_produk=c.id_produk HAVING MAX(c.tgl_berlaku)=d.tgl_berlaku) AND a.id_produk=b.id_produk and b.id_produk=d.id_produk and b.id_produk=e.id_produk and a.id_order='$id_order' and d.id_customer='$id_customer'";

        $this->db->select('a.id_det_penjualan, a.jumlah, b.nm_produk, b.satuan, e.pmodal, d.hna, d.diskon, d.cb');
        $this->db->from('detail_penjualan a, produk b, diskon_produk d,harga_produk e');
        $this->db->where($where, null, false);
        $query = $this->db->get();
 
        return $query->result();
    }


    public function nilai_faktur_all(){
        $data = $this->tampil_all();
        $tdiskon = 0;
        $tcb     = 0;
        $tnet    = 0;
        $tlaba   = 0;
        foreach ($data as $key => $value) {
            $rows    = $this->tampil_order($value->id_order, $value->id_customer, $value->tgl_penjualan);
            $data = array();
            foreach ($rows as $key => $val) {
                $diskon  = ($val->hna*$val->jumlah)-(($val->hna*$val->jumlah)*($val->diskon/100));
                if($value->ppn=='Ya'){
                    $ppn = $diskon*10/100;
                }else{
                    $ppn = '0';
                }
                $cb      = $diskon*$val->cb/100;
                $net     = $diskon-$cb;
                $laba    = $net-($val->pmodal*$val->jumlah);
                $tdiskon += ($diskon+$ppn+$value->ongkos_kirim);
                $tcb     += $cb;
                $tnet    += $net;
                $tlaba   += $laba;
            }
        }
        
        $data['diskon'] = $tdiskon;
        $data['cb']     = $tcb;
        $data['net']    = $tnet;
        $data['laba']   = $tlaba;

        return $data;
    }

     public function nilai_faktur_bulan($bln){
        $data = $this->tampil_bulan($bln);
        $tdiskon = 0;
        $tcb     = 0;
        $tnet    = 0;
        $tlaba   = 0;
        foreach ($data as $key => $value) {
            $rows    = $this->tampil_order($value->id_order, $value->id_customer, $value->tgl_penjualan);
            $data = array();
            foreach ($rows as $key => $val) {
                $diskon  = ($val->hna*$val->jumlah)-(($val->hna*$val->jumlah)*($val->diskon/100));
                if($value->ppn=='Ya'){
                    $ppn = $diskon*10/100;
                }else{
                    $ppn = '0';
                }
                $cb      = $diskon*$val->cb/100;
                $net     = $diskon-$cb;
                $laba    = $net-($val->pmodal*$val->jumlah);
                $tdiskon += ($diskon+$ppn+$value->ongkos_kirim);
                $tcb     += $cb;
                $tnet    += $net;
                $tlaba   += $laba;
            }
        }
        
        $data['diskon'] = $tdiskon;
        $data['cb']     = $tcb;
        $data['net']    = $tnet;
        $data['laba']   = $tlaba;

        return $data;
    }
    
    public function u_masuk_bln(){
        $bln = date('m');
        $thn = date('Y');
        
        $this->db->select('SUM(nominal) AS jumlah');
        $this->db->from('pembayaran');
        $this->db->where("YEAR(tgl_bayar)='$thn' AND MONTH(tgl_bayar)='$bln'");
        $query = $this->db->get();
 
        $row = $query->row_array();
        $data  = $row['jumlah'];
        
        return $data;
    }

    public function u_keluar_bln(){
        $bln = date('m');
        $thn = date('Y');

        $this->db->select('SUM(nominal) AS jumlah');
        $this->db->from('pembayaran_distributor');
        $this->db->where("YEAR(tgl_bayar)='$thn' AND MONTH(tgl_bayar)='$bln'");
        $query = $this->db->get();
 
        $row = $query->row_array();
        $data1  = $row['jumlah'];

        $this->db->select('SUM(nominal) AS jumlah');
        $this->db->from('biop');
        $this->db->where("YEAR(tgl)='$thn' AND MONTH(tgl)='$bln' AND kategori='masuk'");
        $query = $this->db->get();
 
        $row = $query->row_array();
        $data2  = $row['jumlah'];

        $jumlah = $data1+$data2;
        
        return $jumlah;
    }
    
    public function u_masuk_all(){
        $sql   = "SELECT SUM(nominal) AS jumlah FROM pembayaran";
        $this->db->select('SUM(nominal) AS jumlah');
        $this->db->from('pembayaran');
        $query = $this->db->get();
 
        $row = $query->row_array();
        $data  = $row['jumlah'];
        
        return $data;
    }

    public function u_keluar_all(){
        $this->db->select('SUM(nominal) AS jumlah');
        $this->db->from('pembayaran_distributor');
        $query = $this->db->get();
 
        $row = $query->row_array();
        $data1  = $row['jumlah'];

        $this->db->select('SUM(nominal) AS jumlah');
        $this->db->from('biop');
        $this->db->where("kategori='masuk'");
        $query = $this->db->get();
 
        $row = $query->row_array();
        $data2  = $row['jumlah'];

        $jumlah = $data1+$data2;
        
        return $jumlah;
    }

    public function sisa_uang(){
        $masuk = $this->u_masuk_all();
        $keluar= $this->u_keluar_all();

        $sisa = $masuk-$keluar;

        return $sisa;
    }
}