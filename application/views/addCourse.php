<?php include "header.php";?>
<?php $page='one';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>

<br>
<!-- Start Add Course-->
<div class="content">   
    <div class="container-fluid">
        <?php echo form_open('Course_cont/addCourse'); ?>
        <div class="row">
            <div class="col-lg-12 col-lg-12 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Course</h4>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                        <input type="text" class="form-control border-input"  placeholder="Course Name" name="course_name" value="<?php if(isset($_POST['course_name'])){echo $_POST['course_name'];} ?>" required>
                                        <?php echo form_error('course_name', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admission Course</label>
                                        <select  class="form-control border-input" id="coursetype" name="coursetype" required>
                                        <option value="">---Select Admission Course---</option>
                                        <option value="regular">Regular Course</option>
                                        <option value="crash">Crash Course</option>
                                        </select>
                                         <?php echo form_error('coursetype', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                    <label>Standard</label> 
                                    <select class="form-control border-input" id="standard" name="standard" required>
                                        <option value="">---Select Standard---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Commerce">Commerce</option>
                                    </select>
                                    <?php echo form_error('standard', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
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
                                        <select class="form-control border-input" id="engi_branch" name="engi_branch">
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
                                        <select class="form-control border-input" id="semester" name="semester">
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
                            <div class="col-md-6">
                                <div id="commerceDetails" style="display:none;">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                        <select class="form-control border-input" id="commerce_branch" name="commerce_branch">
                                            <option value="">---Select Branch---</option>
                                            <option value="fybcom">FY BCOM</option>
                                            <option value="sybcom">SY BCOM</option>
                                            <option value="tybcom">TY BCOM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="commerce_semester" style="display:none;">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select class="form-control border-input" id="semester1" name="semester1">
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

                        <!--end for branch -->  
                        <div id="schoolSubjects" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                           <div class="row">
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="hindi" name="subject[]" >Hindi
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="english" name="subject[]">English
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="marathi" name="subject[]">Marathi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                             <button type="submit" class="btn btn-success">Add Course</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <?php echo form_close();?>
        <?php echo form_open('Course_cont/course'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="col-1">
                                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                        <h3 class="text-uppercase">Course Details</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" >
                                            <thead>
                                                <tr style="font-weight: bold;">
                                                    <td>Sr No.</td>
                                                    <td>Course ID</td>
                                                    <td>Course Name</td>
                                                    <td>Course Type</td>
                                                    <td>Standard</td>
                                                    <td>Subjects</td>
                                                    <td>Branch</td>
                                                    <td>Semester</td>
                                                    <td>Modify Data</td>
                                                    <td>Delete Data</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($result  as $value): ?>
                                                <tr>
                                                    <td><?php echo $i;$i++; ?></td>
                                                    <td><?php echo $value->course_ID; ?></td>
                                                    <td><?php echo $value->course_name; ?></td>
                                                    <td><?php echo $value->course_type; ?></td>
                                                    <td><?php echo $value->standard; ?></td>
                                                    <td><?php echo $value->subject_id; ?></td>
                                                    <td><?php echo $value->branch; ?></td>
                                                    <td><?php echo $value->semester; ?></td>
                                                    <td><center><button type="submit" class="btn btn-success">Edit</button></center></td>
                                                    <td><center><button type="submit" class="btn btn-danger">Delete</button></center></td>
                                                 <?php endforeach; ?></tr>
                                            </tbody>
                                        </table>    
                                    </div>                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php echo form_close();?>
    </div>
</div>
                <!--End View Course-->

<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "custom_script.php";?>
