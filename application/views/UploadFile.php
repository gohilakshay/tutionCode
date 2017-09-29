<?php include "header.php";?>
<?php $page="five";include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<div class="content">
    <div class="container-fluid">
        <?php if($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
            </div>
        <?php } ?>
        <?php echo form_open_multipart('Upload_FileCont/uploadfile'); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Upload File</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>File Name</label>
                                    <input type="text" class="form-control border-input" name="filename"  placeholder="Enter File Name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control border-input" name="description"  placeholder="Enter Discription">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control border-input" name="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Faculty Name</label>
                                    <input type="text" class="form-control border-input" name="facultyname" placeholder="Enter Faculty name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control border-input" name="filename" >
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit" name="markTeacher" class="btn btn-success" style="margin-top: 8px;"> Upload File</button></center>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">Uploaded Files&emsp;</h3>
                                            </div>
                                            <div class="col-md-8" style="margin-top:-2px;">
                                                    <h3>
                                                         <input type="text" id="teachersearch"
                                                           onkeyup="myFunction()"        placeholder="Search..." style="width:          80%;" required> 
                                                    </h3>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered"  >
                                        <thead>
                                            <tr style="font-weight: bold;" class="header">
                                                <th style="font-weight: bold;">Sr No.</th>
                                                <th style="font-weight: bold;">Upload ID</th>
                                                <th style="font-weight: bold;">File Name</th>
                                                <th style="font-weight: bold;">Discription</th>
                                                <th style="font-weight: bold;">Faculty Name</th>
                                                <th style="font-weight: bold;">Upload Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable"><?php $i=0;foreach($files as $value):?>
                                            <tr>
                                                <td><?php $i++;echo $i;?></td>
                                                <td><?php echo $value->upload_ID?></td>
                                                <td><a data-toggle="modal" data-target="#myModal" onclick="uploadFunction('<?php echo $value->fileLink;?>')"><?php echo $value->filename;?></a></td>
                                                <td><?php echo $value->discription;?></td>
                                                <td><?php echo $value->facultyname;?></td>
                                                <td><?php echo $value->date;?></td>
                                             </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>    
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content upload_img ">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Uploaded File</h4>
        </div>
        <div class="modal-body upload_img">
            <!--<img alt="No File Found" id = "imageUpload" />-->
            <iframe alt="No File Found" id = "imageUpload" ></iframe>
         </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
    function uploadFunction(imgvalue){ 
        var img =  <?php echo json_encode(base_url()); ?>; 
        var imageSrc = img + imgvalue;
        var input = document.getElementById('imageUpload');
        input.src = imageSrc;
    }
</script>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<style> 
    .modal-dialog{text-align:center;}
    .modal-content{display:inline-block;}
    #imageUpload{
        width:488px;
        height:300px;
    }   
input[id=teachersearch] {
    width: 5px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 7px 1px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
}

input[id=studentsearch]:focus {
    width: 80%;
}
</style>