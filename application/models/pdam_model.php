<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Pdam_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function cari($cari){
        $query = "select * from pdam where nama like '%$cari%' or no_pelanggan like '%$cari%'";
        return $this->db->query($query);
    }
    
    public function muncul(){
        return $this->db->limit('1')
                        ->order_by('id_pdam','desc')
                        ->get('pdam');
    }
    
    public function insert($tanggal,$jam,$no_pelanggan,$jenis,$nama,$jumlah){
        $cek = $this->db->insert('pdam',['tanggal'=>$tanggal,'jam'=>$jam,'no_pelanggan'=>$no_pelanggan,'jenis'=>$jenis,'nama'=>$nama,'jumlah'=>$jumlah]);
        if($cek){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function transaksi(){
        return $this->db->get('pdam');
    }
    
    public function total(){
        $query = "select sum(jumlah) as total from pdam";
        return $this->db->query($query);
    }
    
    public function hapus($id){
        return $this->db->delete('pdam',['id_pdam'=>$id]);
    }
    
    public function data_paging($page,$batas){
    $query = "select * from pdam order by id_pdam desc limit $page,$batas ";
    return $this->db->query($query);
  }
    
     public function data_paging_dua($page,$batas,$cari){
    $query = "select * from pdam where nama like '%$cari%' or no_pelanggan like '%$cari%' order by id_pdam desc limit $page,$batas ";
    return $this->db->query($query);
  }
}