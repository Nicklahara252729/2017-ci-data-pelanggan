<?php if(!defined('BASEPATH')) exit ('no file allowed') ;
class Front extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $data['record'] = $this->db->get('deposit')->result();
        $data['jum'] = $this->db->get('deposit')->num_rows();
        $data['total'] = $this->db->query("select sum(jumlah) as total from deposit")->row();
        $data['pln'] = $this->db->query("select sum(jumlah) as total from pln")->row();
        $data['pulsa'] = $this->db->query("select sum(jumlah) as total from pulsa")->row();
        $data['pdam'] = $this->db->query("select sum(jumlah) as total from pdam")->row();
        $data['bpjs'] = $this->db->query("select sum(jumlah) as total from bpjs")->row();
        $data['last'] = $this->db->order_by('id_deposit','desc')->get('deposit')->row();
        $this->template->load('template','content/index',$data);
    }
    
    public function insert(){
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $this->db->insert('deposit',['tanggal'=>$tanggal,'jumlah'=>$jumlah]);
        redirect(site_url('front/'));
    }
    
    public function hapus(){
        $this->db->delete('deposit',['id_deposit'=>$this->uri->segment(3)]);
        redirect(site_url('front'));
    }
    
    public function detail(){
        echo $cari = $this->input->post('tgl');
        $data['jum'] = $this->db->get('deposit')->num_rows();
        $data['total'] = $this->db->query("select sum(jumlah) as total from deposit")->row();
        $data['pln'] = $this->db->query("select sum(jumlah) as total from pln")->row();
        $data['pulsa'] = $this->db->query("select sum(jumlah) as total from pulsa")->row();
        $data['pdam'] = $this->db->query("select sum(jumlah) as total from pdam")->row();
        $data['bpjs'] = $this->db->query("select sum(jumlah) as total from bpjs")->row();
        $data['last'] = $this->db->order_by('id_deposit','desc')->get('deposit')->row();
        $data['record'] = $this->db->get_where('deposit',['tanggal'=>$cari])->result();
        $this->template->load('template','content/index',$data);
    }
}