<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileImg extends CI_Model {
    function addImg ($data,$n){
                if(!empty($data)){
                $config['upload_path'] = 'assets/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
               // $config['file_name'] = $_FILES['photo']['name'];
                $config['file_name'] = $n;
                 $name = $_FILES['photo']['name'];
                    $filename = explode(".",$_FILES['photo']['name']);
                    $extn = end($filename);
                    $pathImg = "assets/profile/$n.$extn";
                    if(file_exists($pathImg)){ unlink("assets/profile/$n.$extn");}else {echo 'NO';}
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('photo')){
                    $uploadData = $this->upload->data();
                    $photo = $uploadData['file_name'];
                }else{
                    $photo = '';
                }
            }else{
                $photo = '';
            }
        }   
}
?>