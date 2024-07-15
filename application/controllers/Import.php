<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Import extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Import_model', 'import');
        $this->load->helper(array('url','html','form'));
    }    
 
    public function index() {
        $this->load->view('display');
    }
 
    public function importFile(){
  
      if ($this->input->post('submit')) {
                 
                $path = 'assets/uploads/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;
                 
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }

                      $date = strtotime($value['B']);
                      $new_date = date('Y-m-d', $date);

                      $inserdata[$i]['tiket_number'] = $value['A'];
                      $inserdata[$i]['submitted_date'] = $new_date;
                      $inserdata[$i]['workshop'] = $value['C'];
                      $inserdata[$i]['service'] = $value['D'];
                      $inserdata[$i]['part'] = $value['E'];
                      $i++;
                    }               
                    $result = $this->import->importData($inserdata);   
                    if($result){
                      echo "Imported successfully";
                    }else{
                      echo "ERROR !";
                    }             
      
              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                  echo $error['error'];
                }
                 
                 
        }
        return redirect(base_url('/'));
    }

    public function delete() {
      $id = $this->uri->segment(2);
      $this->import->deletedata($id);  
      return redirect(base_url('/'));
    }

    public function add() {
      $this->load->view('import');
    }

    public function view() {
      $id = $this->uri->segment(2);
      $result['detail'] = $this->import->viewdata($id);  
      $this->load->view('detail', $result);
    }
     
    public function api() {
      $result = $this->import->apidata();  
      echo json_encode($result);
    }
     
    public function edit() {
      $id = $this->uri->segment(2);
      $result['detail'] = $this->import->viewdata($id);  
      $this->load->view('edit', $result);
    }


    public function multiupload() {
        $this->import->uploadmulti();
        redirect(base_url());
    }

    public function api_tiket_per_day() {
      $result = $this->import->tiket();  
      echo json_encode($result);
    }

    
    public function api_tiket_workshop() {
      $result = $this->import->workshop();  
      echo json_encode($result);
    }

}
?>