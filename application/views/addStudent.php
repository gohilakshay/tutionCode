<?php include "header.php";?>
<?php $page = 'four';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open_multipart('Student_cont/addStudent'); ?>
<br>
    <div class="content">   
        <div class="container-fluid">
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right:    25px;"><span aria-hidden="true">&times;</span></button>
                    <h5><?php echo $this->session->flashdata('success'); ?></h5>
                </div>
            <?php } ?>
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
                        
                        <div class="content">
                            <div class=" setup-content " id="step-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input type="text" class="form-control border-input"  placeholder="Surname" name="surname" value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];} ?>" required>
                                    <?php echo form_error('surname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Student Name" name="studentname" value="<?php if(isset($_POST['studentname'])){echo $_POST['studentname'];} ?>" required>
                                    <?php echo form_error('studentname', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Father Name" name="fathername" value="<?php if(isset($_POST['fathername'])){echo $_POST['fathername'];} ?>" required>
                                    <?php echo form_error('fathername', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Mother Name" name="mothername" value="<?php if(isset($_POST['mothername'])){echo $_POST['mothername'];} ?>" required>
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
                                            <input type="date" name="dob" class="form-control border-input" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>" required>
                                    <?php echo form_error('dob', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control border-input" placeholder="Email" name=email value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required>
                                    <?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                             <input type="text" class="form-control border-input" placeholder="Contact Number" name=contactnumber value="<?php if(isset($_POST['contactnumber'])){echo $_POST['contactnumber'];} ?>" required>
                                    <?php echo form_error('contactnumber', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea rows=2 class="form-control border-input" placeholder="Home Address"  name = "address" name="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required></textarea>
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
                                            <input type="text" class="form-control border-input"  placeholder="Admission Year" name="admissionyear" value="<?php if(isset($_POST['admissionyear'])){echo $_POST['admissionyear'];} ?>" required>
                                    <?php echo form_error('admissionyear', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control border-input"  name="date" value="<?php echo date("Y-m-d"); ?>" required>
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
                                                    <option value="none">--Select Admission Course--</option>
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
                                            <input type="text" class="form-control border-input"  placeholder="School Name/College" name="school_college" value="<?php if(isset($_POST['school_college'])){echo $_POST['school_college'];} ?>" required>
                                    <?php echo form_error('school_college', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Board</label>
                                            <select  class="form-control border-input" id="board" name="board" required>
                                                <option value="none">--Select Board--</option>
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
                                                    <option value="none">--Select Batch--</option>
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
                                            <label>Standard</label>
                                            <div>
                                                <select  class="form-control border-input" id="standard" name="standard" required>
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
                    <!-- Step3 -->
                    <div class="content">         
                        <div class=" setup-content" id="step-3">           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Fees</label>
                                        <input type="text" class="form-control border-input"  placeholder="Total Fees "     name="total_fees" id='Resources' value="<?php if(isset($_POST['total_fees'])){echo $_POST['total_fees'];} ?>" required>
                                    <?php echo form_error('total_fees', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Installment</label>
                                        <div>
                                            <select  class="form-control border-input" id="Installment" name="Installment">
                                                <option value="none">--Select Installment--</option>    
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
                                                    <option value="none">--Select Installment Type--</option>
                                                    <option value="3months">3</option>
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
                                        <label>Discount</label>
                                        <input type="text" class="form-control border-input"  placeholder="Discount" name="discount" id='Minutes'  onblur='Calculate();'  value="<?php if(isset($_POST['discount'])){echo $_POST['discount'];} ?>" required>
                                    <?php echo form_error('discount', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Final Amount</label>
                                        <input type="text" class="form-control border-input"  placeholder="Final Amount " name="final" id='answer' readonly value="<?php if(isset($_POST['final'])){echo $_POST['final'];} ?>" required>
                                    <?php echo form_error('final', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount Per Installment</label>
                                        <input type="text" class="form-control border-input"  placeholder="Final Amount " name="result" id='result' readonly value="<?php if(isset($_POST['result'])){echo $_POST['result'];} ?>" required>
                                    <?php echo form_error('result', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div> 
                                     
                            <!--Batch Timing-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment Mode</label>
                                        <div>
                                            <select  class="form-control border-input" name="paymentmode">
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
                                        <label>Received</label>
                                        <input type="text" class="form-control border-input"  placeholder="Total Fees "     name="received" id="Received"  onblur='Calculate();' value="<?php if(isset($_POST['received'])){echo $_POST['received'];} ?>" required>
                                    <?php echo form_error('received', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <div>
                                            <input type="text" class="form-control border-input"  placeholder="Total Fees "   id="balance"  name="balance"  readonly value="<?php if(isset($_POST['balance'])){echo $_POST['balance'];} ?>" required>
                                    <?php echo form_error('balance', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>            
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Place</label>
                                        <input type="text" class="form-control border-input"  placeholder="Place " name="place"  value="<?php if(isset($_POST['place'])){echo $_POST['place'];} ?>" required>
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
                                    <button type="submit"  id="activate-step-3" class="btn btn-info btn-fill btn-wd">Submit</button>
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