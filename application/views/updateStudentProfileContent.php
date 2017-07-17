<?php include "header.php";?>
<?php $page = 'four';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<?php echo form_open('Student_cont/updateStudentProfile'); ?>
<br>
    <div class="content">   
        <div class="container-fluid">
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
                        
                        <div class="content">
                            <div class=" setup-content " id="step-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Surname</b></label>
                                            <input type="text" class="form-control border-input"  placeholder="Surname" name="surname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Student Name" name="studentname">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Father Name" name="fathername">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Mother Name" name="mothername">
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
                                            <input type="date" class="form-control border-input" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control border-input" placeholder="Email" name=email>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                             <input type="text" class="form-control border-input" placeholder="Contact Number" name=contactnumber>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea rows=2 class="form-control border-input" placeholder="Home Address" value="Melbourne, Australia"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"></div>                     
                                        <label class="col-sm-6">Profile photo:</label>
                                        <div class="row">
                                            <input type="file" class="form-control" name="photo" accept="image/*"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <button type="submit"  id="activate-step-2" class="btn btn-info btn-fill btn-wd">Next</button>
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
                                            <input type="text" class="form-control border-input"  placeholder="Admission Year" name="admissionyear">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control border-input" placeholder="Student Name" name="date">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Admission Course</label>
                                            <div>
                                                <select  class="form-control border-input" id="course_type">
                                                    <option>--Select Admission Course--</option>
                                                    <option>Regular Course</option>
                                                    <option>Crash Course</option>  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School Name/College</label>
                                            <input type="text" class="form-control border-input"  placeholder="School Name/College" name="school_college">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Board</label>
                                            <select  class="form-control border-input" id="board">
                                                <option>--Select Board--</option>
                                                <option>Maharashtra State Board </option>
                                                <option>ICSE</option>
                                                <option>CBSE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Batch Timing we will display From Database from batch table-->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Batch</label>
                                                <select  class="form-control border-input" id="batch">
                                                    <option>--Select Batch--</option>
                                                    <option>9Std-1</option>
                                                    <option>9Std-2</option>
                                                    <option>9Std-3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Batch Timing</label>
                                            <div>
                                                <select  class="form-control border-input" id="batch_timing">
                                                    <option>--Select Batch Timing--</option>
                                                    <option>3:00pm To 6:00pm</option>
                                                    <option>6:00pm To 9:00pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Standard</label>
                                            <div>
                                                <select  class="form-control border-input" id="standard" name="standard">
                                                    <option>--Select Standard--</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>Engineering</option>
                                                    <option>Commerce</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="schoolSubjects" style="display:none;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Subjects:</label>
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <label class="checkbox-inline">
                                                                  <input type="checkbox" value="" name="checkbox" >Hindi
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                  <input type="checkbox" value="checkbox">English
                                                                </label>
                                                                <label class="checkbox-inline">
                                                                  <input type="checkbox" value="checkbox">Marathi
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">     
                                        <div id="commerceDetails" style="display:none;">
                                            <label>Branch:</label>                         
                                            <select class="form-control border-input" id="commerce_branch" name="commerce_branch">
                                                <option value="none">--Select Branch--</option>
                                                <option value="fybcom">FY BCOM</option>
                                                <option value="sybcom">SY BCOM</option>
                                                <option value="tybcom">TY BCOM</option>
                                            </select>
                                        </div><br>
                                    </div>
                                    <div class="col-md-6">              
                                        <div id="commerce_semester" style="display:none;">
                                            <label>Semester</label>
                                            <div>
                                                <select  class="form-control border-input">
                                                    <option>--Select Semester--</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--start for branch-->
                        <div class="row"> 
                            <div class="col-md-6">
                                <div id="engiDegreeDetails" style="display:none;">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                        <select class="form-control border-input" id="engi_branch" name="engi_branch" >
                                            <option value="">---Select Branch---</option>
                                            <option value="Computer">Computer</option>
                                            <option value="IT">IT</option>
                                            <option value="EXTC">EXTC</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Mechanical">Mechanical</option>
                                        </select>
                                        <?php echo form_error('engi_branch', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="semesterDetails" style="display:none;">
                                    <div class="form-group">
                                        <label>Semester:</label>
                                        <select class="form-control border-input" id="semester" name="semester" >
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
                                        <?php echo form_error('semester', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                                         
                                <div class="row">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd"> Update</button>
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