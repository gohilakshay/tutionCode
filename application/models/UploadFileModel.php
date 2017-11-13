<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class UploadFileModel extends CI_Model {
    function addFile ($data,$n){
                if(!empty($data)){
                $config['upload_path'] = 'assets/upload/';
                $config['allowed_types'] = '*';
               // $config['file_name'] = $_FILES['photo']['name'];
                $config['file_name'] = $n;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filename')){
                    $uploadData = $this->upload->data();
                    $photo = $uploadData['file_name'];
                }else{
                     $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                   // return false;
                }
            }else{
                    echo "dataEmpty";
               // return false;
            }
        //return true;
        }   
}
?>