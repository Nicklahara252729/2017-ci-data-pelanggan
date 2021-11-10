<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Bpjs_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function cari($cari){
        $query = "select * from bpjs where nama like '%$cari%' or no_pelanggan like '%$cari%'";
        return $this->db->query($query);
    }
    
    public function muncul(){
        return $this->db->limit('1')
                        ->order_by('id_bpjs','desc')
                        ->get('bpjs');
    }
    
    public function insert($tanggal,$jam,$no_pelanggan,$jenis,$nama,$jumlah){
        $cek = $this->db->insert('bpjs',['tanggal'=>$tanggal,'jam'=>$jam,'no_pelanggan'=>$no_pelanggan,'jenis'=>$jenis,'nama'=>$nama,'jumlah'=>$jumlah]);
        if($cek){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function transaksi(){
        return $this->db->get('bpjs');
    }
    
    public function total(){
        $query = "select sum(jumlah) as total from bpjs";
        return $this->db->query($query);
    }
    
    public function hapus($id){
        return $this->db->delete('bpjs',['id_bpjs'=>$id]);
    }
    
    public function data_paging($page,$batas){
    $query = "select * from bpjs order by id_bpjs desc limit $page,$batas ";
    return $this->db->query($query);
  }
    
    public function data_paging_dua($page,$batas,$cari){
    $query = "select * from bpjs where nama like '%$cari%' or no_pelanggan like '%$cari%' order by id_bpjs desc limit $page,$batas ";
    return $this->db->query($query);
  }
}