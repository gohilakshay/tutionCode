<?php include "header.php";?>
<?php $page='five';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open_multipart('Teacher_cont/addTeacher'); ?>
<br>
<div class="content">
    <div class="container-fluid">
        <?php if($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
            </div>
        <?php } ?>
        <div class="row">
            <a href="<?php echo site_url("Teacher_cont/teacher") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/teachers.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Faculty</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <a href="<?php echo site_url("Teacher_cont/addTeacher") ?>">
                                    <i class="ti-plus"></i> Add Faculty
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Attendance_cont/viewTeacherAttendance") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/present.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>View Attendance</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Attendance_cont/markTeacherAttendance") ?>">
                                    <i class="ti-plus"></i> Mark Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Teacher_cont/TeacherPaymentDetails") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/wallet.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Payment</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Teacher_cont/TeacherPaymentDetails") ?>">
                                    <i class="ti-plus"></i> Faculty Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Upload_FileCont/upload") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/upload.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Assignments</p>
                                    <!--Details-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href=" <?php echo site_url()."/Upload_FileCont/upload" ?> ">
                                    <i class="ti-plus"></i>Upload Assignments 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
<!--
         <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Add Faculty</h3>
                    </div>
                </div>
            </div>
        </div>
-->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Faculty</h4>
                    </div>
   
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Teacher's Name <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" onkeyup="allLatters_only(teachersname, event)" class="form-control border-input validName_only" name="teachersname" value="<?php if(isset($_POST['teachersname'])){echo $_POST['teachersname'];} ?>" placeholder="FirstName &emsp;&emsp;&emsp; LastName  " required>
                                    <?php echo form_error('teachersname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender <span class="required" style="color:red;"> * </span></label>
                                    <div class="row">
                                        <div class="col-md-4"><input type="radio" name="gender" value="male" checked> Male</div>
                                        <div class="col-md-6"><input type="radio" name="gender" value="female"> Female</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DOB <span class="required" style="color:red;"> * </span></label>
                                    <input type="date" class="form-control border-input" name="dob" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>" required>
                                    <?php echo form_error('dob', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>EmailID <span class="required" style="color:red;"> * </span></label>
                                    <input type="email" class="form-control border-input UserName_field" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" placeholder="dummy@mail.com" required>
                                    <?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" onkeypress="phoneno()" id="phone"  maxlength="10" class="form-control border-input UserName_field" name="mobile" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>" placeholder="9876541236" required>
                                    <?php echo form_error('mobile', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Qualification <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" class="form-control border-input" name="qualification" value="<?php if(isset($_POST['qualification'])){echo $_POST['qualification'];} ?>" placeholder="B.E" required>
                                    <?php echo form_error('qualification', '<div class="alert alert-danger contact-warning">',   '</div>'); ?>
                                </div>   
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Salary <span class="required" style="color:red;"> * </span></label>
                                    <input type="text" onkeyup="allnumerics(salary, event)" class="form-control border-input validnumbers" name="salary" value="<?php if(isset($_POST['salary'])){echo $_POST['salary'];} ?>" placeholder="10000" required>
                                    <?php echo form_error('salary', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address <span class="required" style="color:red;"> * </span></label>
                                    <textarea rows="2" type="text" class="form-control border-input" name="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required></textarea>
                                    <?php echo form_error('address', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Joining Date <span class="required" style="color:red;"> * </span></label>
                                    <input type="date" class="form-control border-input" name="joiningdate" value="<?php if(isset($_POST['joiningdate'])){echo $_POST['joiningdate'];} ?>" placeholder="FirstName &emsp;&emsp;&emsp;  MiddleName &emsp;&emsp;&emsp; LastName  " required>
                                    <?php echo form_error('joiningdate', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">                   
                                <label class="col-sm-6">Profile photo:</label>
                                <div class="row">
                                    <input type="file" class="form-control" name="photo" accept="image/jpeg"><br>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Select Subjects </h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Standard <span class="required" style="color:red;"> * </span></label> 
                                    <select class="form-control border-input" id="standard" name="standard" required>
                                        <option value="">---Select Standard---</option>
                                        <?php foreach($result1  as $value): 
                                        if ($value->standard_name=="Engineering"){
                                        ?>
                                         <option value="Engineering"><?php echo $value->standard_name; ?></option>
                                        <?php }
                                        else if ($value->standard_name=="Commerce"){
                                        ?>
                                         <option value="Commerce"><?php echo $value->standard_name; ?></option>
                                        <?php }
                                        else if($value->standard_name== "11th"){ 
                                            ?>
                                         <option value="11"><?php echo $value->standard_name; ?></option>
                                        <?php
                                        }
                                        else if($value->standard_name== "12th"){ 
                                            ?>
                                         <option value="12"><?php echo $value->standard_name; ?></option>
                                        <?php
                                        }
                                        else {
                                        ?>
                                        <option value="<?php echo $value->standard_ID; ?>"><?php echo $value->standard_name; ?></option>
                                        <?php }
                                        endforeach; ?> </select>
                                    <?php echo form_error('standard', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>    
                        
                    <div id="engineer" style="display:none;">
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Branch:</label>
                                    <select class="form-control border-input" id="engi_branch" name="engi_branch">
                                        <option value="">---Select Branch---</option>
                                        <?php foreach($result2  as $value): 
                                        if($value->standard_name==="Engineering") :
                                        ?>
                                                         
                                        <option value="<?php echo $value->branch_name;?>"><?php echo $value->branch_name;?></option>
                                        <?php endif; endforeach; ?>
                                    </select>
                                    <?php echo form_error('engi_branch', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Semester:</label>
                                    <select class="form-control border-input" id="engisemester" name="engisemester">
                                        <option value="">---Select Semester---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>       
                                    </select>
                                    <?php echo form_error('engisemester', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div id="commerce" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Branch:</label>
                                    <select class="form-control border-input" id="commerce_branch" name="commerce_branch">
                                        <option value="">---Select Branch---</option>
                                        <?php foreach($result2  as $value): 
                                        ?>
                                        <option value="<?php echo $value->branch_name;?>"><?php echo $value->branch_name;?></option>
                                        <?php  endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Semester</label>
                                    <select class="form-control border-input" id="commercesemester" name="semester1">
                                        <option value="">---Select Semester---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                
                        <!--start for branch-->
                        <div id="college" style="display:none;">
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                        <select class="form-control border-input" id="stream" name="stream">
                                            <option value="">---Select Branch---</option>
                                            <option value="Science">Science</option>
                                            <option value="Commerce">Commerce</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <!--end for branch-->
                        <div id="schoolSubjects" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                           <div class="row">
                                               <?php foreach($result3 as $value): ?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->subject_ID ;?>" name="subject[]" ><?php echo $value->subject_name ;?>
                                                </label>
                                                <?php endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--for science college-->
                        <div id="scienceSubjects" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                           <div class="row"> 
                                               <?php foreach($result5 as $value):
                                               if($value->branch_ID == 'Science'){ ?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->colgsubj_ID ;?>" name="subject[]" ><?php echo $value->subject_name ;?>
                                                </label>
                                                <?php } endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for commerce college-->
                        <div id="commerceSubjects" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                           <div class="row"> 
                                               <?php foreach($result6 as $value):
                                               if($value->branch_ID == 'Commerce'){ ?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->colgsubj_ID ;?>" name="subject[]" ><?php echo $value->subject_name ;?>
                                                </label>
                                                <?php } endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for commerce degree college-->
                        <div id="commsem1" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 1 && $value->branch_ID == 'Bachelor of Accounting and Finance'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="commsem2" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 2 && $value->branch_ID == 'Bachelor of Accounting and Finance'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="commsem3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 3 && $value->branch_ID == 'Bachelor of Accounting and Finance'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="commsem4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 4 && $value->branch_ID == 'Bachelor of Accounting and Finance'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="commsem5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 5 && $value->branch_ID == 'Bachelor of Accounting and Finance'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="commsem6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 6 && $value->branch_ID == 'Bachelor of Accounting and Finance'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Bachelor of Commerce-->
                        <div id="bcommsem1" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 1 && $value->branch_ID == 'Bachelor of Commerce'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bcommsem3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 3 && $value->branch_ID == 'Bachelor of Commerce'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bcommsem5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 5 && $value->branch_ID == 'Bachelor of Commerce'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--BMS-->
                        <div id="bmscommsem1" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 1 && $value->branch_ID == 'Bachelor of Management Studies'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bmscommsem2" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 2 && $value->branch_ID == 'Bachelor of Management Studies'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bmscommsem3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 3 && $value->branch_ID == 'Bachelor of Management Studies'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bmscommsem4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 4 && $value->branch_ID == 'Bachelor of Management Studies'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bmscommsem5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 5 && $value->branch_ID == 'Bachelor of Management Studies'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bmscommsem6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result8 as $value):
                                                if($value->semester_ID == 6 && $value->branch_ID == 'Bachelor of Management Studies'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->Commercesubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for engi college-->
                        <div id="engisem1" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <?php foreach($result7 as $value):
                                                if($value->semester_ID == 1){
                                                ?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php } endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engisem2" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 2){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicomp3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 3 && $value->branch_ID == 'Computer Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicomp4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 4 && $value->branch_ID == 'Computer Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div id="engicomp5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 5 && $value->branch_ID == 'Computer Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div id="engicomp6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 6 && $value->branch_ID == 'Computer Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div id="engicomp7" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 7 && $value->branch_ID == 'Computer Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicomp8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == 8 && $value->branch_ID == 'Computer Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="engiIT3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '3' && $value->branch_ID == 'Information Technology Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiIT4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '4' && $value->branch_ID == 'Information Technology Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiIT5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '5' && $value->branch_ID == 'Information Technology Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiIT6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '6' && $value->branch_ID == 'Information Technology Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiIT7" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '7' && $value->branch_ID == 'Information Technology Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiIT8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '8' && $value->branch_ID == 'Information Technology Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for Electronics-->
                        <div id="engielectronics3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '3' && $value->branch_ID == 'Electronics Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engielectronics4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '4' && $value->branch_ID == 'Electronics Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engielectronics5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '5' && $value->branch_ID == 'Electronics Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engielectronics6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '6' && $value->branch_ID == 'Electronics Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engielectronics7" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '7' && $value->branch_ID == 'Electronics Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engielectronics8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '8' && $value->branch_ID == 'Electronics Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for extc-->
                        <div id="engiextc3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '3' && $value->branch_ID == 'Electronics and Telecommunication'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiextc4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '4' && $value->branch_ID == 'Electronics and Telecommunication'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiextc5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '5' && $value->branch_ID == 'Electronics and Telecommunication'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiextc6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '6' && $value->branch_ID == 'Electronics and Telecommunication'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiextc7" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '7' && $value->branch_ID == 'Electronics and Telecommunication'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engiextc8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '8' && $value->branch_ID == 'Electronics and Telecommunication'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for mechanical-->
                        <div id="engimech3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '3' && $value->branch_ID == 'Mechanical Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engimech4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '4' && $value->branch_ID == 'Mechanical Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engimech5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '5' && $value->branch_ID == 'Mechanical Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engimech6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '6' && $value->branch_ID == 'Mechanical Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engimech7" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '7' && $value->branch_ID == 'Mechanical Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engimech8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '8' && $value->branch_ID == 'Mechanical Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--for civil-->
                        <div id="engicivil3" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '3' && $value->branch_ID == 'Civil Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicivil4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '4' && $value->branch_ID == 'Civil Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicivil5" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '5' && $value->branch_ID == 'Civil Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicivil6" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '6' && $value->branch_ID == 'Civil Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicivil7" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '7' && $value->branch_ID == 'Civil Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engicivil8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result7 as $value):
                                                if($value->semester_ID == '8' && $value->branch_ID == 'Civil Engineering'){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> <!--content close-->
                </div> <!--card close-->
            </div>
        </div>
    </div> 
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Faculty</button>
                    <!--<button type="reset" class="btn btn-danger">Clear Form</button>-->	
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<?php include "footer.php";?>
<?php include "addModel.php"?>
<?php include "script_include.php"; ?>
<?php include "subject_script.php";?>
<?php include "branch-sem_script.php";?>