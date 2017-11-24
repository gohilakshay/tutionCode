<?php include_once "header.php";?>
<?php $page = 'four';include_once "sidebar.php";?>
<?php include_once "nav.php";?>
<div class="content">
    <div class="container-fluid">
         <div class="row">
            <a href="<?php echo site_url("Student_cont/student") ?>">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content" style="box-shadow: 0 2px 2px rgb(128, 191, 209)!important;">
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
<!--
         <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Student Profile</h3>
                    </div>
                </div>
            </div>
        </div>
        
-->
        <div class="row">
        <a href="<?php echo site_url("Bar_cont/OneStudentMarks/$student_data->stud_ID") ?>">
            <div class="col-lg-4 col-md-5">
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
                                    <p style="color:rgb(79, 172, 205);">Test Marks</p>
                                    <!--Marks-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo site_url("Attendance_cont/OneStudentAttendance/$student_data->stud_ID") ?>">
            <div class="col-lg-4 col-md-5">
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
                                    <p style="color:rgb(79, 172, 205);">Attendance</p>
                                   <!--Present-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="content"> <?php $Firstpay = $result[0];?>
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-  padding templatemo-overflow-hidden" style="overflow:auto;">
                                <div class="panel-heading templatemo-position-relative"     style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-uppercase">Payment History</h3>
                                        </div>
                                        <div class="col-md-5">
                                            <h4>
                                            Student Id : <?php echo $Firstpay->stud_id; ?>
                                            </h4>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" >
                                                    <thead>
                                                        <tr style="font-weight: bold;">
                                                            <td>Installment Option</td>
                                                            <td>Installment Type</td>
                                                            <td>Total Fee</td>
                                                            <td>Discount</td>
                                                            <td>Final Amount</td>
                                                            <td>Received</td>
                                                            <td>Balance</td>
                                                            <td>Amountper Installment</td>
                                                        </tr>
                                                    </thead>
                                                    <tr>
                                                        <td><?php echo $Firstpay->installment_option; ?></td>
                                                        <td><?php echo $Firstpay->installment_type; ?></td>
                                                        <td><?php echo $Firstpay->total_fee; ?></td>
                                                        <td><?php echo $Firstpay->discount; ?></td>
                                                        <td><?php echo $Firstpay->final_fee; ?></td>
                                                        <td><?php echo $Firstpay->recieved_fee; ?></td>
                                                        <td><?php echo $Firstpay->balance_fee; ?></td>
                                                        <td><?php echo $Firstpay->amountper_installment; ?></td>
                                                    </tr>
                                                </table>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Sr No.</td>
                                                <td>Payment Mode</td>
                                                <td>Payment Date</td>
                                                <td>Cheque Date</td>
                                                <td>Bank Name</td>
                                                <td>Cheque Number </td>
                                                <td>Transaction ID</td>
                                                
                                                <td>Received</td>  
                                                <td>Paid Recently</td>
                                                <td>Balance</td>
                                            </tr>
                                            <?php $i=1;foreach($result as $value): ?>
                                            <tr>
                                                <td><?php echo $i;$i++; ?></td>
                                                <td><?php echo $value->payment_mode; ?></td>
                                                <td><?php echo $value->paydate; ?></td>
                                                <td><?php echo $value->chq_date; ?></td>
                                                <td><?php echo $value->bank_name; ?></td>
                                                <td><?php echo $value->chq_no; ?></td>
                                                <td><?php echo $value->transc_id; ?></td>
                                                <td><?php echo $value->recieved_fee; ?></td>
                                                <td><?php echo $value->paid_fee; ?></td>
                                                <td><?php echo $value->balance_fee; ?></td>
                                             </tr>
                                            <?php endforeach;?>
                                        </thead>
                                       
                                    </table>    
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<?php include_once "footer.php";?>
<?php include_once "addModel.php"?>
<?php include_once "script_include.php"; ?>
