
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
                         <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
								<p>Profile</p>
                            </a>
                             <ul class="dropdown-menu">
                                    <!--<div class="row">
                                        <div class="col-md-12">
                                            <img src="<?php echo base_url()?>assets/profile/admin.jpg" width="200" height="150" class="img-circle" style="padding-left:10px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center><b><h4><?php echo $username = $this->session->userdata('username');?></h4></b></center>
                                        </div>
                                    </div>
                                 
                                 <center>
                                     <form action="<?php echo site_url("Home") ?>">
                                     <button class="btn btn-primary">Sign Out</button>
                                     </form>  
                                 </center>
                              </ul>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>