<?php 
$sql ="SELECT * FROM enquiry";
$query = $this->db->query($sql);
$enquiryTotal=0;
foreach ($query->result() as $row) {
   $followDate = $row->followup_date;
    $date1 = date('Y-m-d', strtotime("-1 days"));
    $date2 = date('Y-m-d', strtotime("+1 days"));
   if($followDate >= $date1 && $followDate <= $date2){
       $enquiryTotal++;
      $enquiry[] = array('followDate'=>$followDate,'name'=>$row->name,'id'=>$row->enquiry_ID);
   }
} 
?>
<div class="main-panel">
<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
						<li>
                            <a href=" <?php echo site_url()."/Upload_FileCont/upload" ?> ">
								<i class="ti-upload"></i>
								<p>Upload</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-wallet"></i>
									<p>Expense</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                  <li>
                                    <a href="<?php echo site_url()."/Expense_cont/expense" ?>">
                                        Expense Report
                                    </a>
                                  </li>
                                  <li>
                                      <a href="<?php echo site_url()."/Student_cont/feeDetail/3" ?>">
                                          Fee Details
                                      </a>
                                  </li>
                              </ul>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
									<span class="badge"><?php echo $enquiryTotal; ?></span>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                  <li style="width:350px">
                                      <table class="table table-borderless" >
                                          <thead>
                                            <th><strong>Sr No.</strong></th>
                                            <th><strong>Name</strong></th>
                                            <th><strong>Follow Up Date</strong></th>
                                          </thead>
                                          <tbody>
                                              <?php $i=1;foreach($enquiry as $value){
                                              $enqid = $value['id']; ?>
                                              <tr>
                                                  <td><a href="<?php echo site_url()."/Enquiry_cont/enquiryInfo/$enqid" ?>"><?php echo $i;$i++; ?></a></td>
                                                  <td><a href="<?php echo site_url()."/Enquiry_cont/enquiryInfo/$enqid" ?>"><?php echo $value['name'] ?></a></td>                
                                                  <td><a href="<?php echo site_url()."/Enquiry_cont/enquiryInfo/$enqid" ?>"><?php echo $value['followDate'] ?></a></td>
                                              </tr>
                                              <?php } ?>
                                          </tbody>
                                      </table>
                                  </li>
                              </ul>
                        </li>
                         <li>
                            <a href="<?php echo site_url()."/Scheduler_cont" ?>" >
                                <i class="ti-time"></i>
								<p>Scheduler</p>
                            </a>
                           
                                
                                
                            
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
								<p>Profile</p>
                            </a>
                             <ul class="dropdown-menu">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <center><b><h4><?php echo $username = $this->session->userdata('username');?></h4></b></center>
                                     </div>
                                 </div>
                                 <center>
                                     <form action="<?php echo site_url("Home") ?>" method="post">
                                         <input type="hidden" name="signout" />
                                     <button class="btn btn-primary">Sign Out</button>
                                     </form>  
                                 </center>
                              </ul>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>