<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Quesioner', 'm_quesioner');
    }

    public function index()
    {
        $data['pertanyaan'] = $this->m_quesioner->getSoal();

        $this->load->view('frontend/v_landing', $data);
    }

    public function save()
    {
        $save = $this->m_quesioner->save();
        if ($save) {
            $data['success'] = true;
            $data['msg'] = "Simpan Data Berhasil";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menyimpan Data";
        }

        die(json_encode($data));
    }
}
