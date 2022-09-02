<?php

/**
 *
 * Created at 2022-05-25 10:57:05
 * Updated at
 *
 */

class C_Respondent extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Respondent', 'm_respondent');
    }

    function index()
    {
        $get_settings = $this->my_model->get_setting();
        $data['setting'] = $get_settings;

        $this->load->view('backend/v_respondent', $data);
    }

    function getAll()
    {

        $get = $this->m_respondent->getAll();
        if (!empty($get)) {
            $data['success'] = true;
            $data['msg'] = "Data Tersedia";
            $data['data'] = $get;
        } else {
            $data['success'] = false;
            $data['msg'] = "Data Kosong";
        }

        die(json_encode($data));
    }

    // end of class
}
