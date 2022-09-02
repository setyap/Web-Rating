<?php

/**
 *
 * Created at 2022-05-25 10:57:05
 * Updated at
 *
 */

class C_Quesioner extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Quesioner', 'm_quesioner');
    }

    function index()
    {
        $get_settings = $this->my_model->get_setting();
        $data['setting'] = $get_settings;
        $data["quesioner"] = $this->m_quesioner->getAllSoal();

        $this->load->view('backend/v_quesioner', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_akun');
        $stat = $this->input->post('stat');

        $update = $this->m_quesioner->updateSoal($id, $stat);
        if ($update) {
            $data['success'] = true;
            $data['msg'] = "Simpan Data Berhasil";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menyimpan Data";
        }

        die(json_encode($data));
    }

    public function save()
    {
        $update = $this->m_quesioner->saveSoal();
        if ($update) {
            $data['success'] = true;
            $data['msg'] = "Simpan Data Berhasil";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menyimpan Data";
        }

        die(json_encode($data));
    }

    public function delete()
    {
        $id = $this->input->post('id_akun');

        $delete = $this->m_quesioner->delete($id);
        if ($delete) {
            $data['success'] = true;
            $data['msg'] = "Simpan Data Berhasil";
        } else {
            $data['success'] = false;
            $data['msg'] = "Gagal Menyimpan Data";
        }

        die(json_encode($data));
    }

    // end of class
}
