<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileImg extends CI_Model {
    function addImg ($data,$n){
                if(!empty($data)){
                $config['upload_path'] = 'assets/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
               // $config['file_name'] = $_FILES['photo']['name'];
                $config['file_name'] = $n;
                 $name = $_FILES['photo']['name'];
                    $pathImg = "assets/profile/$n.jpg";
                    if(file_exists($pathImg)){unlink("assets/profile/$n.jpg");}else {echo 'NO';}
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