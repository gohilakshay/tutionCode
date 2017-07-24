<?php include "header.php";?>
<?php $page='seven';include "sidebar.php";?>
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
                        <h4 class="title">Update Course</h4>
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
                                        <?php foreach($result1  as $value): 
                                        if ($value->standard_name=="Engineering"){
                                        ?>
                                         <option value="Engineering"><?php echo $value->standard_name; ?></option>
                                   <?php }
                                        else if ($value->standard_name=="Commerce"){
                                        ?>
                                         <option value="Commerce"><?php echo $value->standard_name; ?></option>
                                   <?php }
                                        else {
                                            ?>
                                         <option value="<?php echo $value->standard_ID; ?>"><?php echo $value->standard_name; ?></option>
                                        <?php
                                        }
                                        endforeach; ?> </select>
                                    <?php echo form_error('standard', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                                            
                            </div> 
                        </div>
                        <!--start for branch-->
                        <div id="engineer" style="display:none;">
                            <div class="row"> 
                                <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Branch:</label>
                                            <select class="form-control border-input" id="engi_branch" name="engi_branch">
                                                <option value="">---Select Branch---</option>
                                                <?php foreach($result2  as $value): 
                                                    if ($value->standard_ID==13){ ?>
                                                <option value="<?php echo $value->branch_name;?>"><?php echo $value->branch_name;?></option>
                                                 <?php } endforeach; ?>
                                            </select>
                                    <?php echo form_error('engi_branch', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                        </div>

                                </div>
                                <div class="col-md-6">
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
                        
                        <div id="commerce" style="display:none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                            <select class="form-control border-input" id="commerce_branch" name="commerce_branch">
                                                <option value="">---Select Branch---</option>
                                                <?php foreach($result2  as $value): 
                                                    if ($value->standard_ID==14){ ?>
                                                <option value="<?php echo $value->branch_name;?>"><?php echo $value->branch_name;?></option>
                                                 <?php } endforeach; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                        
                        <div id="engisem1" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <?php foreach($result3 as $value):
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
                                               <?php foreach($result3 as $value):
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
                                               <?php foreach($result3 as $value):
                                                if($value->semester_ID == 3){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div id="engicomp4" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result3 as $value):
                                                if($value->semester_ID == 4){?>
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
                                               <?php foreach($result3 as $value):
                                                if($value->semester_ID == 5){?>
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
                                               <?php foreach($result3 as $value):
                                                if($value->semester_ID == 6){?>
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
                                               <?php foreach($result3 as $value):
                                                if($value->semester_ID == 7){?>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="<?php echo $value->engisubj_ID; ?>" name="subject[]" ><?php echo $value->subject_name; ?>
                                                </label>
                                                <?php }endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div id="engicomp8" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                               <?php foreach($result3 as $value):
                                                if($value->semester_ID == 8){?>
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
                        <div id="commercesem1" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="accounts" name="commerce[]" >Accounts
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="marketing" name="commerce[]">Marketing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="commercesem2" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="finance" name="commerce1[]" >Finance
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                             <button type="submit" class="btn btn-success">Update Course</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <?php echo form_close();?>
    </div>
</div>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "subject_script.php";?>
<?php include "branch-sem_script.php";?>
