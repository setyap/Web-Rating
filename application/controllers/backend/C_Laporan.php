<?php

/**
 *
 * Created at 2022-05-25 10:57:05
 * Updated at
 *
 */

class C_Laporan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Laporan', 'm_laporan');
        $this->load->model('M_Respondent', 'm_respondent');
    }

    function index()
    {
        $get_settings = $this->my_model->get_setting();
        $data['feedback'] = $this->m_laporan->Feedback();
        $data['setting'] = $get_settings;
        $data['rating30'] = $this->m_laporan->Rate();
        $data['damage'] = $this->m_laporan->Damage();

        $this->load->view('backend/v_laporan', $data);
    }

    // end of class
}
