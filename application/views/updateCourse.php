<?php include "header.php";?>
<?php $page='seven';include "sidebar.php";?>
<?php include "nav.php";?>
<?php $this->load->library('form_validation'); ?>
<br>

<?php foreach($course as $v): ?>
<!-- Start Add Course-->
<div class="content">   
    <div class="container-fluid">
        <?php echo form_open('Course_cont/updateCourse'); ?>
        <div class="row">
            <div class="col-lg-12 col-lg-12 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Update Course</h4>
                    </div>
                     <input type="hidden" value="<?php echo $v->course_ID;?>" name="course_id" >
                    <div class="content">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                        <input type="text" class="form-control border-input"  placeholder="Course Name" name="course_name" value="<?php echo $v->course_name; ?>" required>
                                        <?php echo form_error('course_name', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Admission Course</label>
                                        <select  class="form-control border-input" id="coursetype" name="coursetype" required>
                                            <option value="<?php echo $v->course_type; ?>"><?php echo $v->course_type; ?></option>  
                                            <option value="">-- Select Course --</option>
                                        
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
                                        <option value="<?php echo $v->standard_name; ?>"><?php echo $v->standard_name; ?></option>  
                                        
                                        <option value="">--- Select Standard ---</option>
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
                                        <option value="others">Others</option>
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
                                            <option value="<?php echo $v->branch_name; ?>"><?php echo $v->branch_name; ?></option>
                                            <option value="">---Select Branch---</option>
                                            <option value="Science">Science</option>
                                            <option value="Commerce">Commerce</option>
                                            <option value="Art">Art</option>
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
                                                <option value="<?php echo $v->branch_name; ?>"><?php echo $v->branch_name; ?></option>
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
                                                <option value="<?php echo $v->semester;?>"><?php echo $v->semester;?></option>
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
                                                <option value="<?php echo $v->branch_name; ?>"><?php echo $v->branch_name; ?></option>
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
                                                <option value="<?php echo $v->semester;?>"><?php echo $v->semester;?></option>
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
                       
                  
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Selected Subjects:</label>
                                        <div class="col-sm-12">
                                           <div class="row">
                                              <?php  
                                                    $subjects = explode(",",$v->subject_id);
                                                    foreach($subjects as $subName){
                                                    ?>
                                                <label class="checkbox-inline">
                                                     <input type="checkbox" value="<?php echo $subName; ?>" name="subject[]" checked disabled><?php echo $subName;?>
                                                </label>
                                             <?php } ?>
                                            </div>
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
                        <!--for Art college-->
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
                                                <input type="text" class="form-control border-input UserName_field"  placeholder="Other Branch" name="other_branch" value="<?php echo $v->branch_name; ?>">
                                                <?php echo form_error('other_branch', '<div class="alert alert-danger contact-warning">', '</div>');?> 
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Other Subjects<span class="required" style="color:red;"> * </span></label>
                                                <input type="hidden" value="<?php echo $v->subject_id; ?>" name="othrsubjname"/>
                                                <input type="text" class="form-control border-input UserName_field"  placeholder="Other Subject" name="other_subject" value="<?php echo $v->subject_id; ?>">
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
    </div>
</div>
<?php endforeach; ?>
<?php include "footer.php";?>
<?php include "addModel.php";?>
<?php include "script_include.php";?>
<?php include "subject_script.php";?>
<?php include "branch-sem_script.php";?>
