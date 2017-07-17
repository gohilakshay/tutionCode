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
                 
                        
                 

            <a class="navbar-brand"><input type="text" id="search" name="search" placeholder="Search.."></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-upload"></i>
								<p>Upload</p>
                            </a>
                        </li>
                         <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>assets/profile/admin.jpg" width="30" height="25" class="img-circle">
								<p>Profile</p>
                            </a>
                             <ul class="dropdown-menu">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?php echo base_url()?>assets/profile/admin.jpg" width="200" height="150" class="img-circle" style="padding-left:10px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center><b><h4>Admin</h4></b></center>
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
<style> 
input[id=search] {
    width: 5px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 50px;
    font-size: 16px;
    background-color: white;
    background-image: url('<?php echo base_url()?>assets/icon/search.png');
    background-position: 7px 1px; 
    background-repeat: no-repeat;
    background-size: 21px;
    padding-left: 35px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[id=search]:focus {
    width: 100%;
}
</style>