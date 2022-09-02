<?php

/**
 *
 * Created at 2022-05-25 10:57:05
 * Updated at
 *
 */

class C_Home extends MY_Controller
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
        $data['respon'] = $this->m_respondent->getRespondenLimit();
        $data['total_respon'] = $this->m_respondent->countRespondent();
        $data['rating'] = $this->m_respondent->ratingAll();

        $this->load->view('backend/v_dasboard', $data);
    }

    // end of class
}
