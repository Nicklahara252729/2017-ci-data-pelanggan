<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Pulsa_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function cari($cari){
        $query = "select * from pulsa where nama like '%$cari%' or no_pelanggan like '%$cari%'";
        return $this->db->query($query);
    }
    
    public function muncul(){
        return $this->db->limit('1')
                        ->order_by('id_pulsa','desc')
                        ->get('pulsa');
    }
    
    public function insert($tanggal,$jam,$no_pelanggan,$jenis,$nama,$jumlah){
        $cek = $this->db->insert('pulsa',['tanggal'=>$tanggal,'jam'=>$jam,'no_pelanggan'=>$no_pelanggan,'jenis'=>$jenis,'nama'=>$nama,'jumlah'=>$jumlah]);
        if($cek){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function transaksi(){
        return $this->db->get('pulsa');
    }
    
    public function total(){
        $query = "select sum(jumlah) as total from pulsa";
        return $this->db->query($query);
    }
    
    public function hapus($id){
        return $this->db->delete('pulsa',['id_pulsa'=>$id]);
    }
    
    public function data_paging($page,$batas){
    $query = "select * from pulsa order by id_pulsa desc limit $page,$batas ";
    return $this->db->query($query);
  }
    
      public function data_paging_dua($page,$batas,$cari){
    $query = "select * from pulsa where nama like '%$cari%' or no_pelanggan like '%$cari%' order by id_pulsa desc limit $page,$batas ";
    return $this->db->query($query);
  }
}