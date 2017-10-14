<?php include "header.php";?>
<?php $page = 'four';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open_multipart('Student_cont/addStudent'); ?>
<br>
<div class="content">   
    <div class="container-fluid">
        <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right:25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } ?>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Add Student</h3>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <a href="<?php echo site_url("Student_cont/student") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
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
            <a href="<?php echo site_url("Bar_cont/bar") ?>">
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
        <div class="row">
            <div class="col-lg-10 col-md-10 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Student</h4>
                        <ul class="nav nav-pills nav-justified thumbnail setup-panel" >
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
                            <li class="disabled">
                                <a href="#step-3">
                                    <h4 class="list-group-item-heading">Step 3</h4>
                                </a>
                            </li> 
                        </ul>
                    </div>     
                    <!--step 1-->
                    <div class="content">
                        <div class="setup-content " onload="validateInput()" onmousedown="validateInput()" onkeyup="validateInput()" id="step-1" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input type="text"  onkeyup="allLatters(surname, event)" class="form-control border-input validName"  placeholder="Surname" name="surname" value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];} ?>">
                                        <?php echo form_error('surname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name <span class="required" style="color:red;"> * </span></label>
                                      <input type="text" class="form-control student_details border-input validName_1"  onkeyup="allLatters_1(studentname, event)" placeholder="Student Name" name="studentname" value="<?php if(isset($_POST['studentname'])){echo $_POST['studentname'];} ?>" required>
                                        <?php echo form_error('studentname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father Name <span class="required" style="color:red;"> * </span></label>
                                      <input type="text" class="form-control student_details border-input validName_2" onkeyup="allLatters_2(fathername, event)"  placeholder="Father Name" name="fathername" value="<?php if(isset($_POST['fathername'])){echo $_POST['fathername'];} ?>" required>
                                        <?php echo form_error('fathername', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mother Name</label>
                                        <input type="text" class="form-control border-input validName_3" placeholder="Mother Name" onkeyup="allLatters_3(mothername, event)" name="mothername" value="<?php if(isset($_POST['mothername'])){echo $_POST['mothername'];} ?>" >
                                        <?php echo form_error('mothername', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender <span class="required" style="color:red;"> * </span></label>
                                        <div class="row">
                                            <div class="col-md-4"> <input type="radio" name="gender" class="student_details" value="male" checked>Male</div>
                                            <div class="col-md-6"><input type="radio" name="gender" class="student_details" value="female">Female</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB <span class="required" style="color:red;"> * </span></label>
                                        <input type="date" name="dob" id="enter_disable"  class="form-control border-input student_details " value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>" required>
                                        <?php echo form_error('dob', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control border-input" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" >
                                        <?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number <span class="required" style="color:red;"> * </span></label>
                                        <input type="text" onkeypress="phoneno()" id="phone"  maxlength="10" class="form-control student_details border-input" placeholder="Contact Number" name="contactnumber" value="<?php if(isset($_POST['contactnumber'])){echo $_POST['contactnumber'];} ?>" required>
                                        <?php echo form_error('contactnumber', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address <span class="required" style="color:red;"> * </span></label>
                                            <textarea rows=2 class="form-control  student_details border-input" placeholder="Home Address"  name = "address" name="address"  required><?php if(isset($_POST['address'])){echo $_POST['address'];} ?></textarea>
                                    <?php echo form_error('address', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">                    
                                    <label class="col-sm-6">Profile photo:</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control" name="photo" accept="image/*"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <button type="next"  id="activate-step-2" class="btn btn-info btn-fill btn-wd" > Next</button>
                                    </div>
                                    <div class="clearfix"></div>    
                                </div>
                             </div>
                        </div>

                        <!--Step 2-->
                        <div class="content">
                            <div class="setup-content" onload="validateInput1()" onmousedown="validateInput1()" onkeyup="validateInput1()" id="step-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Admission Year <span class="required" style="color:red;"> * </span></label>
                                            <input type="text" class="form-control student_admission border-input"  placeholder="Admission Year" name="admissionyear" value="<?php if(isset($_POST['admissionyear'])){echo $_POST['admissionyear'];} ?>" required>
                                    <?php echo form_error('admissionyear', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" id="enter_disable" class="form-control border-input"  name="date" value="<?php echo date("Y-m-d"); ?>" required>
                                    <?php echo form_error('date', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Admission Course <span class="required" style="color:red;"> * </span></label>
                                            <div>
                                                <select  class="form-control student_admission border-input" id="course_type" name="course_type" required>
                                                    <option value="">--Select Admission Course--</option>
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
                                            <label>School Name/College <span class="required" style="color:red;"> * </span></label>
                                            <input type="text" class="form-control student_admission border-input"  placeholder="School Name/College" name="school_college" value="<?php if(isset($_POST['school_college'])){echo $_POST['school_college'];} ?>" required>
                                    <?php echo form_error('school_college', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Board <span class="required" style="color:red;"> * </span></label>
                                            <select  class="form-control student_admission border-input" id="board" name="board" required>
                                                <option value="">--Select Board--</option>
                                                <option value="maharashtra">Maharashtra State Board </option>
                                                <option value="icse">ICSE</option>
                                                <option value="cbse">CBSE</option>
                                                <option value="other">Other</option>
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
                                                <label>Batch <span class="required" style="color:red;"> * </span></label>
                                                <select  class="form-control student_admission border-input" id="batch" name="batch" required>
                                                    <option value="">--Select Batch--</option>
                                                    <?php foreach($result as $value) {?>
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
                                            <label>Standard <span class="required" style="color:red;"> * </span></label>
                                            <div>
                                                <select  class="form-control student_admission border-input" id="standard" name="standard" required>
                                                    <option value="">---Select Standard---</option>
                                                    <?php foreach ($result1 as $value){?>
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
                                        <button type="next"  id="activate-step-3" class="btn btn-info btn-fill btn-wd"> Next</button>
                                    </div>
                                    <div class="clearfix"></div>    
                                </div>
                            </div>
                        </div>
                    <!-- Step 3 -->
                    <div class="content">         
                        <div class="setup-content" onload="validateInput2()" onmousedown="validateInput2()" onkeyup="validateInput2()" id="step-3">           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Fees <span class="required" style="color:red;"> * </span></label>
                                        <input type="text" onkeyup="allnumerics(total_fees, event)" class="form-control student_payment student_payment_1 border-input validnumbers"  placeholder="Total Fees" name="total_fees" id='Resources' value="<?php if(isset($_POST['total_fees'])){echo $_POST['total_fees'];} ?>" required>
                                    <?php echo form_error('total_fees', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Installment                                         <label>Total Fees <span class="required" style="color:red;"> * </span></label>
                                        </label>
                                        <div>
                                            <select  class="form-control  border-input" id="Installment" id="Installments" name="Installment" required>
                                                <option value="">--Select Installment--</option>    
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            <?php echo form_error('Installment', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>            
                            </div>
                         
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="installmenttype" style="display:none;">
                                        <div class="form-group">
                                            <label>Select Installment Type</label>
                                            <div>
                                                <select  class="form-control border-input" id="Payamount" name="installmenttype">
                                                    <option value="">--Select Installment Type--</option>
                                                    <option value="2months">2</option>
                                                    <option value="3months">3</option>
                                                    <option value="4months">4</option>
                                                    <option value="5months">5</option>
                                                    <option value="6Months">6</option>     
                                                </select>
                                                <?php echo form_error('installmenttype', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Discount </label>
                                        <input type="text" onkeyup="allnumerics_1(discount, event)"  class="form-control student_payment student_payment_1 border-input validnumbers_1"  placeholder="Discount" name="discount" id='Minutes'  onblur='Calculate();'  value="<?php if(isset($_POST['discount'])){echo $_POST['discount'];} ?>">
                                    <?php echo form_error('discount', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Final Amount <span class="required" style="color:red;"> * </span></label>
                                        <input type="text" class="form-control border-input"  placeholder="Final Amount " name="final" id='answer' readonly value="<?php if(isset($_POST['final'])){echo $_POST['final'];} ?>" required>
                                    <?php echo form_error('final', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount Per Installment</label>
                                        <input type="text" class="form-control border-input"  placeholder="Final Amount " name="result" id='result' readonly value="<?php if(isset($_POST['result'])){echo $_POST['result'];} ?>" >
                                    <?php echo form_error('result', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div> 
                                     
                            <!--payment mode-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment Mode <span class="required" style="color:red;"> * </span></label>
                                        <div>
                                            <select  class="form-control student_payment student_payment_1 border-input" name="paymentmode">
                                                <option value="">--Select Payment Mode--</option>
                                                <option value="cash">Cash</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="creditcard">Credit Card</option>
                                                <option value="debitcard">Debit Card</option>
                                                <option value="netbanking">Net Banking</option>
                                            </select>
                                            <?php echo form_error('paymentmode', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Received <span class="required" style="color:red;"> * </span></label>
                                        <input type="text" onkeyup="allnumerics_2(received, event)" class="form-control student_payment student_payment_1 border-input validnumbers_2"  placeholder="Total Fees" name="received" id="Received"  onblur='Calculate();' value="<?php if(isset($_POST['received'])){echo $_POST['received'];} ?>" required>
                                    <?php echo form_error('received', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Balance <span class="required" style="color:red;"> * </span></label>
                                        <div>
                                            <input type="text" class="form-control border-input"  placeholder="Total Fees " id="balance"  name="balance"  readonly value="<?php if(isset($_POST['balance'])){echo $_POST['balance'];} ?>" required>
                                    <?php echo form_error('balance', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>            
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Place <span class="required" style="color:red;"> * </span></label>
                                        <input type="text" class="form-control student_payment student_payment_1 border-input"  placeholder="Place " name="place"  value="<?php if(isset($_POST['place'])){echo $_POST['place'];} ?>" required>
                                    <?php echo form_error('place', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div>
                                            <input type="date" class="form-control border-input" name="date1" value="<?php echo date("Y-m-d"); ?>" required>
                                    <?php echo form_error('date1', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                            
                            <div class="row">
                                <div class="text-center">
                                    <button type="submit" id="activate-step-3" class="btn btn-info btn-fill btn-wd">Submit</button>
                                </div>
                                <div class="clearfix"></div>    
                            </div>
                        </div>
                    </div>
                    <!--Step3 End-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close();?>
<?php include_once "footer.php";?>
<?php include_once "addModel.php"?>
<?php include_once "script_include.php"; ?>
<?php include "custom_script.php";?>
<?php include "subject_script.php";?>
<?php include "branch-sem_script.php";?>