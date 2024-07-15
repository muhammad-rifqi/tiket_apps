<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Import_model extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function importData($data) {
  
            $res = $this->db->insert_batch('tiket',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
      
        }

        public function listdata() {
           return $this->db->query("select * from tiket")->result_array();
        }

        
        public function deletedata($id) {
            return $this->db->query("delete from tiket where id = '".$id."'");
         }

        public function viewdata($id) {
            return $this->db->query("select * from tiket where id = '".$id."'")->result_array();
         }

         public function apidata() {
            return $this->db->query("select * from tiket ")->result_array();
         }

         public function uploadmulti(){
            $files = $_FILES;
            $jumlah =  count($_FILES['foto']['name']);  
            $config['upload_path'] = 'assets/images/'; 
            $config['allowed_types'] = 'jpg|png|jpeg'; 
            $this->load->library('upload',$config);
            for ($i=0; $i < $jumlah ; $i++) { 
              $_FILES['foto']['name'] = $files['foto']['name'][$i];
              $_FILES['foto']['type'] = $files['foto']['type'][$i];
              $_FILES['foto']['tmp_name'] = $files['foto']['tmp_name'][$i];
              $_FILES['foto']['error'] = $files['foto']['error'][$i];
              $_FILES['foto']['size'] = $files['foto']['size'][$i];
              $this->upload->initialize($config); 
                if($this->upload->do_upload('foto')){ 
                    $fileData = $this->upload->data(); 
                    $this->db->query("insert into foto(id_tiket,foto)values('".$this->input->post('id_tiket')."','".$fileData['file_name']."')");
                }
            }
         }

         public function tiket() {
            return $this->db->query("select tiket_number,submitted_date,count(tiket_number) as jml from tiket group by submitted_date")->result_array();
         }

         public function workshop() {
            return $this->db->query("select workshop,sum(service + part) as jml from tiket group by workshop")->result_array();
         }
    }
?>