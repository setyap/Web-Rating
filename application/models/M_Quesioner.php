<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Quesioner extends CI_Model
{
    private $_table = "tm_pertanyaan";

    public function getPertanyaan()
    {
        $query = $this->db->order_by("id_pertanyaan", "asc")->get('tm_pertanyaan');

        return $query->result_array();
    }

    public function getSoal()
    {
        $this->db->select("*");
        $this->db->from('tm_pertanyaan');
        $this->db->where('is_active', '1');
        $this->db->order_by('id_pertanyaan', 'asc');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAllSoal()
    {
        $this->db->select("*");
        $this->db->from('tm_pertanyaan');
        $this->db->order_by('id_pertanyaan', 'asc');

        $query = $this->db->get();

        if ($query) {
            $data = $query->result_array();

            if (!empty($data)) {
                $no = 1;
                foreach ($data as $key => $val) {
                    $val['no'] = $no;
                    $is_active = $val['is_active'];

                    if ($is_active == 1) {
                        $val['status'] = 'Active';
                    } else {
                        $val['status'] = 'Disactive';
                    }


                    $new_data[] = $val;
                    $no++;
                }
            }
        }

        return $new_data;
    }

    function updateSoal($id_soal, $is_active)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl_update = date('Y-m-d H:i:s');

        $data_soal = array(
            'is_active' => $is_active,
            'tgl_update' => $tgl_update,
        );
        $where = array(
            'id_pertanyaan' => $id_soal
        );

        return $this->db->update('tm_pertanyaan', $data_soal, $where);
    }

    function saveSoal()
    {
        $quesioner = $this->input->post('quesioner');

        date_default_timezone_set("Asia/Jakarta");
        $tgl_create = date('Y-m-d H:i:s');

        $data_akun = array(
            'pertanyaan' => $quesioner,
            'tgl_create' => $tgl_create
        );

        return $this->db->insert($this->_table, $data_akun);
    }

    public function delete($id)
    {
        $where = array('id_pertanyaan' => $id);

        return $this->db->delete($this->_table, $where);
    }

    function save()
    {
        //Responden
        $nama = $this->input->post('nama_lengkap');
        $usia = $this->input->post('usia');
        $email = $this->input->post('email');
        $avg = $this->input->post('avg');
        $kesimpulan = $this->input->post('kesimpulan');

        date_default_timezone_set("Asia/Jakarta");
        $create_date = date('Y-m-d H:i:s');

        $data_responden = array(
            'nama' => $nama,
            'usia' => $usia,
            'email' => $email,
            'create_date' => $create_date
        );
        $this->db->insert('tr_responden', $data_responden);
        $id_responden = $this->db->insert_id();

        //Other
        $kerusakan = $this->input->post('kerusakan');
        $feedback = $this->input->post('feedback');

        $data_other = array(
            'kerusakan' => $kerusakan,
            'feedback' => $feedback,
            'create_date' => $create_date
        );
        $this->db->insert('tr_other', $data_other);
        $id_other = $this->db->insert_id();

        $nilai_aspek = $this->input->post('nilai_aspek');

        foreach ($nilai_aspek as $key => $val) {
            $dataSer_aspek[] = array(
                'id_aspek' => $key,
                'nilai' => $val,
            );
        }

        // print_r($dataSer_aspek); exit;
        $dataSer_aspek = serialize($dataSer_aspek);

        $data_jawaban = array(
            'id_responden' => $id_responden,
            'id_other' => $id_other,
            'jawaban' => $dataSer_aspek,
            'avg' => $avg,
            'kesimpulan' => $kesimpulan,
            'create_date' => $create_date
        );

        return $this->db->insert('tr_jawaban', $data_jawaban);
    }
}
