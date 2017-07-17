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
                    <li class="active">
                        <a href="<?php echo site_url()."/Test/mainP" ?>">
                            <i class="ti-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ti-email"></i>
                            <p>Inbox</p>
                        </a>
                    </li> 
                    <li>
                        <a href="">
                            <i class="ti-pencil-alt"></i>
                            <p>Enquiry</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()."/Test/addS" ?>">
                           <i> <img src="<?php echo base_url()?>assets/icon/student.png"></i>
                            <p>Student</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()."/Test/addT" ?>">
                            <i><img src="<?php echo base_url()?>assets/icon/teacher.png"></i>
                            <p>Faculty</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()."/Test/markAttendance" ?>">
                            <i class="ti-hand-open"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                    <li>
                        <a href="icons.php">
                            <i class="ti-wallet"></i>
                            <p>Expense Report</p>
                        </a>
                    </li>

                    <!--<li>
                        <a href="maps.php">
                            <i class="ti-pencil-alt"></i>
                            <p>Reports</p>
                        </a>
                    </li>
                    <li>
                        <a href="notifications.php">
                            <i class="ti-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li>-->
                    <!--<li class="active-pro">
                        <a href="upgrade.php">
                            <i class="ti-export"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>