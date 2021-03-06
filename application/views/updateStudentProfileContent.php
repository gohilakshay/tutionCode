<?php include "header.php";?>
<?php $page = 'four';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php 

$student_data = $result[0];
$batch_data = $result[1];
$fee_data = end($result);
?>
<?php echo form_open_multipart('Student_cont/updateStudentProfile'); ?>
<br>
    <div class="content">   
        <div class="container-fluid">
                <div class="row">
            <a href="<?php echo site_url("Student_cont/student") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/students.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Student_cont/addStudent") ?>" >
                                    <i class="ti-plus"></i> Add Student
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Test_cont/addTest") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <img src="<?php echo base_url()?>assets/icon/test.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Test Marks</p>
                                    <!--Marks-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Marks_cont/addMarks") ?>" >   
                                    <i class="ti-plus"></i> Add Marks
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Attendance_cont/viewStudentAttendance") ?>">
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
                                <a href="<?php echo site_url("Attendance_cont/markStudentAttendance") ?>">
                                    <i class="ti-plus"></i> Mark Attendance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
          <a  href="<?php echo site_url()."/Bar_cont/bar" ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/performance.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Performance</p>
                                    <!--Details-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                 <a href="<?php echo site_url()."/Bar_cont/bar" ?>">
                                    <i class="ti-plus"></i> view Performance 
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
                        <h3 class="text-uppercase" style="margin-top:10px;"> Update Student Profile</h3>
                    </div>
                </div>
            </div>
        </div>
-->
            <div class="row">
                <div class="col-lg-10 col-md-10 ">
                    <div class="card">
                        
                        <div class="header">
                            <h4 class="title">Update Student</h4>
                            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                <li class="active">
                                    <a href="#step-1">
                                        <h4 class="list-group-item-heading">Step 1</h4>
                                    </a>
                                </li>
                                <li class="disabled">
                                    <a href="#step-2">
                                        <h4 class="list-group-item-heading">Step 2</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" value="<?php echo $student_data->stud_ID; ?>" name="stud_id" >
                        <div class="content">
                            <div class=" setup-content " id="step-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input type="text" class="form-control border-input"  placeholder="Surname" name="surname" value="<?php echo $student_data->stud_surname; ?>" >
                                    <?php echo form_error('surname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Student Name" name="studentname" value="<?php echo $student_data->stud_name; ?>" required>
                                    <?php echo form_error('studentname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Father Name" name="fathername" value="<?php echo $student_data->father_name; ?>" required>
                                    <?php echo form_error('fathername', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Mother Name" name="mothername" value="<?php echo $student_data->mother_name; ?>" >
                                    <?php echo form_error('mothername', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="row">
                                                <div class="col-md-4"> <input type="radio" name="gender" value="male" checked>Male</div>
                                                <div class="col-md-6"><input type="radio" name="gender" value="female">Female</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DOB</label>
                                            <input type="date" name="dob" class="form-control border-input datepicker" value="<?php echo $student_data->stud_dob; ?>" required>
                                    <?php echo form_error('dob', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control border-input" placeholder="Email" name=email value="<?php echo $student_data->stud_email; ?>" >
                                    <?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                             <input type="text" class="form-control border-input" placeholder="Contact Number" name=contactnumber value="<?php echo $student_data->stud_contact; ?>" required>
                                    <?php echo form_error('contactnumber', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent's Email</label>
                                        <input type="email" class="form-control border-input UserName_field" placeholder="Email" name="pemail" value="<?php echo $student_data->pemail; ?>" >
                                        <?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent's Contact Number </label>
                                        <input type="text"  maxlength="10" class="form-control student_details border-input phoneInput" placeholder="Contact Number" name="pcontactnumber" value="<?php echo $student_data->pcontactnumber; ?>" required>
                                        <?php echo form_error('contactnumber', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea rows=2 class="form-control border-input" placeholder="Home Address"  name = "address" name="address" value="" required><?php echo $student_data->stud_address; ?></textarea>
                                    <?php echo form_error('address', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="proImg" value="<?php echo  $student_data->stud_profile ;?>" />
                                <div class="row">
                                    <div class="form-group">                    
                                    <label class="col-sm-6">Profile photo:</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="file"  class="form-control" style="height:auto;" name="photo" accept="image/*"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <button type="next"  id="activate-step-2" class="btn btn-info btn-fill btn-wd"> Next</button>
                                    </div>
                                    <div class="clearfix"></div>    
                                </div>
                             </div>
                        </div>

                        <!--Step 2-->
                        <div class="content">
                            <div class=" setup-content" id="step-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Admission Year</label>
                                            <input type="text" class="form-control border-input"  placeholder="Admission Year" name="admissionyear" value="<?php echo $student_data->admission_year; ?>" required>
                                    <?php echo form_error('admissionyear', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control border-input datepicker"  name="date" value="<?php echo $student_data->admission_date; ?>" required>
                                    <?php echo form_error('date', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Admission Course</label>
                                            <div>
                                                <select  class="form-control border-input" id="course_type" name="course_type" required>
                                                    <option value="<?php echo $student_data->course_type; ?>"><?php echo $student_data->course_type; ?></option>
                                                    <option value="regularcourse">Regular Course</option>
                                                    <option value="crashcourse">Crash Course</option>  
                                                </select>
                                                 <?php echo form_error('course_type', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School Name/College</label>
                                            <input type="text" class="form-control border-input"  placeholder="School Name/College" name="school_college" value="<?php echo $student_data->sch_coll_name; ?>" required>
                                    <?php echo form_error('school_college', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Board</label>
                                            <select  class="form-control border-input" id="board" name="board" required>
                                                <option value="<?php echo $student_data->board; ?>"><?php echo $student_data->board; ?></option>
                                                <option value="maharashtra">Maharashtra State Board </option>
                                                <option value="icse">ICSE</option>
                                                <option value="cbse">CBSE</option>
                                            </select>
                                            <?php echo form_error('board', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                               
                                <!--Batch Timing we will display From Database from batch table-->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Batch</label>
                                                <select  class="form-control border-input" id="batch" name="batch" required>
                                                    <option value="<?php echo $batch_data->batch_ID; ?>"><?php echo $batch_data->batch_name; ?></option>
                                                    <option value="">--- Select Batch ---</option>
                                                    <?php foreach($ViewBatch as $value) {?>
                                                    <option value="<?php echo $value->batch_ID; ?>"><?php echo $value->batch_name; ?></option>
                                                    <?php }?>
                                                </select>
                                                <?php echo form_error('batch', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                            </div>
                                        </div>
                                      </div> 
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Standard</label>
                                            <div><?php echo $student->standard_name;?>
                                                <select  class="form-control border-input" id="standard" name="standard" required>
                                                    <option value="<?php echo $student_data->standard_name;?>"><?php echo $student_data->standard_name;?></option>
                                                    <?php foreach ($standard as $value){?>
                                                    <option value="<?php echo $value->standard_name;?>"><?php echo $value->standard_name;?></option>
                                                    <?php }?>
                                                </select>
                                                 <?php echo form_error('standard', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                            </div>
                                        </div>  
                                    </div>
                                </div><br>
                                         
                                <div class="row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                                </div>
                                <div class="clearfix"></div>    
                            </div>
                            </div>
                        </div>
                   </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close();?>
<?php include_once "footer.php";?>
<?php include_once "addModel.php"?>
<?php include_once "script_include.php"; ?>
<?php include_once "custom_script.php";?>