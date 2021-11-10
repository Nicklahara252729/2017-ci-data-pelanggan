<?php
if(!defined('BASEPATH')) exit ('no file allowed');
class Pdam extends CI_Controller{
    function __constrcut(){
        parent::__construct();
    }
    
    public function index(){
        $config['total_rows']= $this->pdam_model->transaksi()->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'pdam/index/';
        $config['per_page'] = 50;
        $this->pagination->initialize($config);
        $data['paging'] = $this->pagination->create_links();
        $page = $this->uri->segment(3);
        $page = $page==''?0:$page;
        
        if(isset($_POST['cari_pln'])){
            $cari = $this->input->post('cari_pln');
            $data['jumlah'] = $this->pdam_model->transaksi()->num_rows();
            $data['tot'] = $this->pdam_model->total()->row();
            $data['show'] = $this->pdam_model->data_paging_dua($page,$config['per_page'],$cari)->result();
            $this->template->load('template','content/pdam',$data);    
        }else{
            $data['show'] = $this->pdam_model->data_paging($page,$config['per_page'])->result();
            $data['jumlah'] = $this->pdam_model->transaksi()->num_rows();
            $data['tot'] = $this->pdam_model->total()->row();
            $this->template->load('template','content/pdam',$data);
        }
        
    }
    
    public function insert(){
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $no_pelanggan = $this->input->post('no_pelanggan');
        $jenis = $this->input->post('jenis');
        $nama = $this->input->post('nama');
        $jumlah = $this->input->post('jumlah');
        if(isset($_POST['enter_insert'])){
            $in = $this->pdam_model->insert($tanggal,$jam,$no_pelanggan,$jenis,$nama,$jumlah);
            if($in == TRUE){
                redirect(site_url('pdam/'));
            }else{
                echo"gagal memasukkan data";
            }
        }
    }
    
    public function hapus(){
        $id = $this->uri->segment(3);
        $this->pdam_model->hapus($id);
        redirect(site_url('pdam/'));
    }
}