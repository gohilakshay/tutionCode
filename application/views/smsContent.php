<div class="content">
    <div class="container-fluid">
        <!--<div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;     border-color: #9fcedc;">
                        <h3 class="text-uppercase" style="margin-top: 10px;">Student</h3>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <center><button type="button" style="border-radius:10px; color:black; border-color: #51d8dc; background-color:#51d8dc; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-primary btn-lg">Total<br>111</button>&emsp;
                        <button type="button" style="border-radius:10px; color:black; border-color: #7ac29a; background-color:#7ac29a; padding:11px; padding-left:70px; padding-right:70px;" class="btn btn-success btn-lg">Success<br>111</button>&emsp;
                        <button type="button" style="border-radius:10px; color:black; border-color: #e44554; background-color:#e44554; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-danger btn-lg">Failed<br>0</button>&emsp;
                        <a href="<?php echo site_url()."/Sms_cont/sendSMS" ?>"><button type="button" style="border-radius:10px; color:black; border-color: #f3de26; background-color:#f3de26; padding:11px; padding-left:80px; padding-right:80px;" class="btn btn-danger btn-lg">Send<br>SMS</button></a></center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="card">
                        <div class="col-1">
                            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                                <div class="panel-heading templatemo-position-relative" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <h3 class="text-uppercase">SMS Details</h3>
                                            </div>
                                            <form name="search">
                                                <div class="col-md-8" style="margin-top:-2px;">
                                                    <h3>
                                                        <input type="text" id="smssearch" name="smssearch" placeholder="Search..." style="width: 80%;" required> 
                                                        <button type="submit" class="btn btn-success">search</button></h3>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr style="font-weight: bold;">
                                                <td>Date : 21st july
                                                    <div class="pull-right">
                                                        <label>To :&emsp;</label><input type="date" name="to">
                                                        <label>From :&emsp;</label><input type="date" name="from">
                                                        <button type="submit"> Search</button> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                        <button>All</button><button>success</button><button>Failed</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="ti-email"></i>&emsp;Name&emsp;(8965314569)<br>
                                                    &emsp;&emsp;The lecture for mathematics of K.P Sir has been cancelled and has been scheduled on 25th of july from 2.00 to 5.00pm<br>
                                                    &emsp;&emsp;<i class="ti-timer"></i>&emsp;Date and time</td>
                                            </tr>
                                            <tr>
                                                <td><i class="ti-email"></i>&emsp;Name&emsp;(9655314569)<br>
                                                    &emsp;&emsp;Message<br>
                                                    &emsp;&emsp;<i class="ti-timer"></i>&emsp;Date and time</td>
                                            </tr>
                                            <tr>
                                                <td><i class="ti-email"></i>&emsp;Name&emsp;(7665314569)<br>
                                                    &emsp;&emsp;Message<br>
                                                    &emsp;&emsp;<i class="ti-timer"></i>&emsp;Date and time</td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style> 
input[id=smssearch] {
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
}

input[id=smssearch]:focus {
    width: 80%;
}
</style>