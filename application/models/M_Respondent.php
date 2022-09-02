<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Respondent extends CI_Model
{

    public function getAll()
    {

        $where = $this->input->post('where');

        $new_data = array();

        // Query from View
        $this->db->select('*');
        $this->db->from('v_responden');
        $this->db->order_by('create_date', 'desc');

        if (!($where === 'all')) {
            $this->db->where('summary', $where);
        }

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();

            if (!empty($data)) {
                $no = 1;
                foreach ($data as $key => $val) {
                    $val['no'] = $no;
                    $progress = $val['score'] * 20;

                    $val['rate'] = '<div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: ' . $progress . '%" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100"></div>
                </div>';

                    $new_data[] = $val;
                    $no++;
                }
            }
        }

        return $new_data;
    }

    public function getRespondenLimit()
    {
        $new_data = array();

        // Query from View
        $this->db->select('*');
        $this->db->from('v_responden');
        $this->db->order_by('create_date', 'desc');
        $this->db->limit(6);

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();

            if (!empty($data)) {
                $no = 1;
                foreach ($data as $key => $val) {
                    $val['no'] = $no;
                    $progress = $val['score'] * 20;

                    $val['rate'] = '<div class="progress progress-md mx-4">
                    <div class="progress-bar" role="progressbar" style="width: ' . $progress . '%" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100"></div>
                </div>';

                    $new_data[] = $val;
                    $no++;
                }
            }
        }

        return $new_data;
        // print_r($new_data);
        // exit;
    }

    public function countRespondent()
    {
        $query = $this->db->get('v_responden');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function ratingAll()
    {
        $new_data = array();

        $query1 = $this->db->query('SELECT format(AVG(score),1) AS rating FROM v_responden');
        $rating = $query1->row()->rating;

        $query2 = $this->db->query('SELECT summary, COUNT(*) as jumlah FROM v_responden GROUP BY summary');
        $dataset = $query2->result_array();

        $new_data['rating'] = $rating;
        $new_data['dataset'] = $dataset;

        // $new_data[] = $val;

        return $new_data;
        // print_r($new_data);
        // exit;
    }
}
