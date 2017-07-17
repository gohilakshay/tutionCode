<?php include "header.php" ?>
<body>
    <div class="col-lg-4 col-md-7" align="center">
    <div class="card">
        <div class="header" style=" border: 2px solid white;
    background: #68B3C8;
    border-radius: 20px;
    padding: 10px">
            <h4 class="title" style="color: white; font-weight:800">LogIn</h4>
        </div>
        <div class="content" padding-left="10px">
            <form action="<?php echo site_url("Test/mainP") ?>" method="post">
                <div class="row" >                        
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Username</label>
                            <input type="text" class="form-control border-input" placeholder="Username" value="michael23">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>First Name</label>
                                <input type="text" class="form-control border-input" placeholder="Company" value="Chet">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">LogIn</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <?php include "footer.php" ?>
 </div>
</body>
