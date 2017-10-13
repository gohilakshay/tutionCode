<div class="content">
    <?php if($this->session->flashdata('success')) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-right: 25px;"><span aria-hidden="true">&times;</span></button>
        <h5><?php echo $this->session->flashdata('success'); ?></h5>
    </div>
    <?php } ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Quick Access</h3>
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
                                    <p> Students</p>
                                    
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
            <a href="<?php echo site_url("Teacher_cont/teacher") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row"> 
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <img src="<?php echo base_url()?>assets/icon/teachers.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p> Faculties</p>
                                    
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
            <a href="<?php echo site_url("Course_cont/addCourse") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <img src="<?php echo base_url()?>assets/icon/courses.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Courses Offered</p>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Course_cont/addCourse") ?>">
                                    <i class="ti-plus"></i> Add Courses
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo site_url("Batch_cont/addBatch") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/batches.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Set Of Batches</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Batch_cont/addBatch") ?>">
                                    <i class="ti-plus"></i> Add Batches
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="row">
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
            <a href="<?php echo site_url("Attendance_cont/markStudentAttendance") ?>">
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
                                    <p>Attendance</p>
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
            <a href="<?php echo site_url("Upload_FileCont/upload") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <img src="<?php echo base_url()?>assets/icon/news.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Upload Files</p>
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Upload_FileCont/upload") ?>">
                                    <i class="ti-plus"></i> Add Events
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
                                <div class="icon-big icon-info text-center">
                                    <img src="<?php echo base_url()?>assets/icon/schedule.png"  >
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Test</p>
                                    <!--Details-->
                                </div>
                            </div>
                        </div>
                        <div class="footer"><hr>
                            <div class="stats">
                                <a href="<?php echo site_url("Test_cont/addTest") ?>">
                                    <i class="ti-plus"></i> Add test 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>                   
    </div>
</div>