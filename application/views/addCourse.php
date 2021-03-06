<?php include "header.php";?>
<?php $page='seven';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>
<!-- Start Add Course-->
<div class="content">   
    <div class="container-fluid">
        <?php if($this->session->flashdata('success') == 'You have Successfully submitted data.') { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } else if($this->session->flashdata('success') == 'Course Already Exits.') { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
            <h5><?php echo $this->session->flashdata('success'); ?></h5>
        </div>
        <?php } ?>
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
                                        <label>Course Name <span class="required" style="color:red;"> * </span></label>
                                        <input type="text" class="form-control border-input UserName_field"  placeholder="Course Name" name="course_name" value="<?php if(isset($_POST['course_name'])){echo $_POST['course_name'];} ?>" required>
                                        <?php echo form_error('course_name', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admission Course <span class="required" style="color:red;"> * </span></label>
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
                                        endforeach; ?>
                                       <option value="others">others</option>
                                    </select>
                                    <?php echo form_error('standard', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
                                </div>
                            </div>
                                            
                            </div> 
                        </div>
                        <!--start for branch-->
                        <div id="college" style="display:none;">
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                        <select class="form-control border-input" id="stream" name="stream">
                                            <option value="">---Select Branch---</option>
                                            <?php ;foreach($result9 as $v):
                                            if($v == 'jrcolg_com'){
                                            ?>
                                            <!--<option value="Science">Science</option>-->
                                            <option value="Commerce">Commerce</option>
                                            <?php }
                                            else if($v == 'jrcolg_sci'){
                                            ?>
                                            <option value="Science">Science</option>
                                            <?php  
                                            }
                                            else if($v == 'jrcolg_art'){
                                            ?>
                                            <option value="Art">Arts</option>
                                            <?php  
                                            }
                                            endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="engineer" style="display:none;">
                            <div class="row"> 
                                <div class="col-md-6">
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
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch:</label>
                                            <select class="form-control border-input" id="commerce_branch" name="commerce_branch">
                                                <option value="">---Select Branch---</option>
                                                <?php foreach($result2  as $value): 
                                                if($value->standard_name==="Commerce") :
                                                   ?>
                                                <option value="<?php echo $value->branch_name;?>"><?php echo $value->branch_name;?></option>
                                                 <?php endif; endforeach; ?>
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

                        <!--end for branch   -->
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
                        <!--for commerce college-->
                        <div id="artSubjects" style="display:none;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Subjects:</label>
                                        <div class="col-sm-12">
                                           <div class="row"> 
                                               <?php foreach($result10 as $value):
                                               if($value->branch_ID == 'Art'){ ?>
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
                        
                        
                        <div id="others" style="display:none;">
                            <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Other Branch <span class="required" style="color:red;"> * </span></label>
                                                <input type="text" class="form-control border-input UserName_field"  placeholder="Other Branch" name="other_branch" value="<?php if(isset($_POST['other_branch'])){echo $_POST['other_branch'];} ?>">
                                                <?php echo form_error('other_branch', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Other Subjects<span class="required" style="color:red;"> * </span></label>
                                                <input type="text" class="form-control border-input UserName_field"  placeholder="Other Subject" name="other_subject" value="<?php if(isset($_POST['other_subject'])){echo $_POST['other_subject'];} ?>">
                                                <?php echo form_error('other_subject', '<div class="alert alert-danger contact-warning">', '</div>');?> 
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
        
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="col-1">
                                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="overflow:auto;">
                                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">Course Details&emsp;</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="myTable">
                                            <thead>
                                                <tr class="header">
                                                    <th style="font-weight: bold;">Sr No.</th>
                                                    <th style="font-weight: bold;">Course ID</th>
                                                    <th style="font-weight: bold;">Course Name</th>
                                                    <th style="font-weight: bold;">Course Type</th>
                                                    <th style="font-weight: bold;">Standard</th>
                                                    <th style="font-weight: bold;">Subjects</th>
                                                    <th style="font-weight: bold;">Branch</th>
                                                    <th style="font-weight: bold;">Semester</th>
                                                    <th style="font-weight: bold;">Modify Data</th>
                                                    <th style="font-weight: bold;">Delete Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=$offset; foreach($result  as $value): ?>
                                                <tr>
                                                     <td><?php $i++;echo $i;?></td>
                                                    <td><?php echo $value->course_ID; ?></td>
                                                    <td><?php echo $value->course_name; ?></td>
                                                    <td><?php echo $value->course_type; ?></td>
                                                    <td><?php echo $value->standard_name; ?></td>
                                                    <td><?php echo $value->subject_id; ?></td>
                                                    <td><?php $b = $value->branch_name;
                                                            if($b==""){ echo "--";}
                                                            else echo $b;
                                                        ?></td>
                                                    <td><?php $s = $value->semester; 
                                                        if($s==""){ echo "--";}
                                                            else echo $s;
                                                        ?></td>
                                                    <td>
                                                        <?php echo form_open('Course_cont/updateCourse'); ?>
                                                            <div class="text-center">
                                                                <input type="hidden" value="<?php echo $value->course_ID; ?>" name="course_id">
                                                                <center><button type="submit" class="btn btn-success" >Edit</button></center>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo form_open('Course_cont/deleteCourse'); ?>
                                                        <center>
                                                        <input type="hidden" value="<?php echo $value->course_ID; ?>" name="course_id">
                                                        <button type="submit" onClick="return doconfirm();" class="btn btn-danger" >Delete</button></center>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                                 <?php endforeach; ?></tr>
                                            </tbody>
                                        </table> 
                                         <center>
                                      <ul class="pagination">
                                          <!-- Show pagination links -->
                                          <?php
                                          foreach ($links as $link) {
                                          
                                              echo "<li>" . $link . "</li>";
                                          }
                                          ?>
                                    </ul>
                                    </center>
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
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "branch-sem_script.php";?>

