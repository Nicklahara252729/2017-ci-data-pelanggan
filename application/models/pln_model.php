<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Pln_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function cari($cari){
        $query = "select * from pln where nama like '%$cari%' or no_pelanggan like '%$cari%'";
        return $this->db->query($query);
    }
    
    public function muncul(){
        return $this->db->limit('1')
                        ->order_by('id_pln','desc')
                        ->get('pln');
    }
    
    public function insert($tanggal,$jam,$no_pelanggan,$jenis,$nama,$jumlah){
        $cek = $this->db->insert('pln',['tanggal'=>$tanggal,'jam'=>$jam,'no_pelanggan'=>$no_pelanggan,'jenis'=>$jenis,'nama'=>$nama,'jumlah'=>$jumlah]);
        if($cek){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function transaksi(){
        return $this->db->get('pln');
    }
    
    public function total(){
        $query = "select sum(jumlah) as total from pln";
        return $this->db->query($query);
    }
    
    public function hapus($id){
        return $this->db->delete('pln',['id_pln'=>$id]);
    }
    
    public function data_paging($page,$batas){
    $query = "select * from pln order by id_pln desc limit $page,$batas ";
    return $this->db->query($query);
  }
     public function data_paging_dua($page,$batas,$cari){
    $query = "select * from pln where nama like '%$cari%' or no_pelanggan like '%$cari%' order by id_pln desc limit $page,$batas ";
    return $this->db->query($query);
  }
}