<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="info">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        Digital Education
                    </a>
                </div>
                <ul class="nav">
                    <li <?php if($page == 'one'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Home/mainP" ?>">
                            <i class="ti-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li <?php if($page == 'four'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Student_cont/student" ?>">
                           <i> <img src="<?php echo base_url()?>assets/icon/student.png"></i>
                            <p>Student</p>
                        </a>
                    </li>
                    <li <?php if($page == 'five'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Teacher_cont/teacher" ?>">
                            <i><img src="<?php echo base_url()?>assets/icon/teacher.png"></i>
                            <p>Faculty</p>
                        </a>
                    </li>
                    <li <?php if($page == 'six'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Attendance_cont/markStudentAttendance" ?>">
                            <i class="ti-hand-open"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                    <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-plus"></i>
									<p>ADD Details</p>
                              </a>
                              <ul class="dropdown-menu" style="background-color:#d2caca">
                                  <li <?php if($page == 'seven'){ echo ' class="active"';}?>>
                                      <a href="<?php echo site_url("Course_cont/addCourse") ?>">
                                          <p><img src="<?php echo base_url()?>assets/icon/coursesidebar.png"> &emsp;Add Courses</p>
                                      </a>
                                  </li>
                                  <li <?php if($page == 'eight'){ echo ' class="active"';}?>>
                                      <a href="<?php echo site_url("Batch_cont/addBatch") ?>">
                                          <p><img src="<?php echo base_url()?>assets/icon/batchessidebar.png"> &emsp;Add Batches</p>
                                      </a>
                                  </li>
                              </ul>
                    </li>
                    <li <?php if($page == 'two'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Sms_cont/smsDetails" ?>">
                            <i class="ti-email"></i>
                            <p>SMS</p>
                        </a>
                    </li> 
                    <li <?php if($page == 'three'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Enquiry_cont/enquiry" ?>">
                            <i class="ti-pencil-alt"></i>
                            <p>Enquiry</p>
                        </a>
                    </li>
                    
                    <!--keep it for upgrade after beta version-->
                    <!--<li <?php if($page == 'nine'){ echo ' class="active"';}?>>
                        <a href="<?php echo site_url()."/Schedular_cont/schedular" ?>">
                           <p><img src="<?php echo base_url()?>assets/icon/scheduler.png">&emsp; Scheduler</p>
                        </a>
                    </li>-->
                    
                </ul>
            </div>
        </div>