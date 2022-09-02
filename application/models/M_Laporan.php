<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Laporan extends CI_Model
{

    public function Rate()
    {
        $new_data = array();

        $query1 = $this->db->query('SELECT summary, COUNT(*) AS jumlah FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day GROUP BY summary');
        $rate30 = $query1->result_array();

        $query2 = $this->db->query('SELECT * FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day');
        if ($query2->num_rows() > 0) {
            $total30 = $query2->num_rows();
        } else {
            $total30 = 0;
        }

        $query3 = $this->db->query('SELECT format(AVG(score),1) AS rating FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day');
        $avg30 = $query3->row()->rating;

        $query4 = $this->db->query('SELECT MONTHname(create_date) AS bulan, year(create_date) AS tahun, FORMAT(AVG(score), 1) AS rating, COUNT(*) AS jumlah FROM v_responden WHERE CREATE_date >= CURDATE() - INTERVAL 1 YEAR GROUP BY bulan ORDER BY create_date ASC');
        $rateyear = $query4->result_array();

        $new_data['total30'] = $total30;
        $new_data['avg30'] = $avg30;
        $new_data['rate30'] = $rate30;
        $new_data['rateyear'] = $rateyear;

        return $new_data;
        // print_r($new_data);
        // exit;
    }

    public function Damage()
    {
        $new_data = array();

        $query1 = $this->db->query('SELECT if(kerusakan="Iya","Paket Rusak","Paket Aman") as kerusakan, COUNT(*) AS jumlah FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day GROUP BY kerusakan');
        $damage30 = $query1->result_array();

        $query2 = $this->db->query('SELECT * FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day');
        if ($query2->num_rows() > 0) {
            $total30 = $query2->num_rows();
        } else {
            $total30 = 0;
        }

        $query3 = $this->db->query('SELECT if(kerusakan="Iya","Paket Rusak","Paket Aman") as kerusakan, COUNT(*) AS jumlah,format(((COUNT( * ) / ( SELECT COUNT( * ) FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day)) * 100 ),1) AS percentage FROM v_responden WHERE CREATE_date >= curdate()- interval 30 day and kerusakan = "Tidak" GROUP BY kerusakan');
        $avg30 = $query3->row()->percentage;

        $new_data['total30'] = $total30;
        $new_data['avg30'] = $avg30;
        $new_data['damage30'] = $damage30;

        return $new_data;
        // print_r($new_data);
        // exit;
    }

    public function Feedback()
    {
        $new_data = array();

        // Query from View
        $this->db->select('*');
        $this->db->from('v_responden');
        $this->db->order_by('create_date', 'desc');
        $this->db->where('CREATE_date >= curdate()- interval 30 day');

        // $this->db->limit(6);

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
}
