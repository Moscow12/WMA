<style>
a{
    cursor:pointer !important;
}



@media (max-width:700){
    .list-group{
        display: none !important;
    }
    .home-section{
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
}

</style>
<section>
    <header>
        <h4><b style="colorblack;">Username:</b>&nbsp;<?=$_SESSION['username'];?></h4>
        <link rel="stylesheet" href="css/bootstraps.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/jQuery.min.js"></script>
        <script src="js/boostrap.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/jsfunc.js"></script>
    </header>
    <div id="section-page">

        <div class="row">

            <div class="col-md-3">

                <div class="bar-side">

                    <div class="top">
                        <img src="./images/logo.png" alt="" style="width:80px;height:80px;">
                    </div> 


                    <div class="list-group">
                        <a class="list-group-item" href="./index.php?id=dashboard">
                        <i class="fa fa-home fa-fw"></i>&nbsp; Home</a>
                        
                        <a class="list-group-item" href="./index.php?id=customers">
                        <i class="fa fa-group fa-fw"></i>&nbsp; Add Customers</a>
                        
                        <a class="list-group-item" href="./index.php?id=services">
                        <i class="fa fa-industry fa-fw"></i>&nbsp; Services</a>
                        <a class="list-group-item" href="./index.php?id=payment">
                        <i class="fa fa-money fa-fw"></i>&nbsp; Payment</a>
                        <a class="list-group-item" href="./index.php?id=Report">
                        <i class="fa fa-book fa-fw"></i>&nbsp; Report</a>
                        
                        <!-- <div class="list-group-item" data-toggle="collapse" href="#collapse1"><i class="fa fa-cog fa-fw"></i>Settings
                            <div id="collapse1" class="panel-collapse collapse">
                                <a class="list-group-item" href="./index.php?id=workstation">
                                <i class="fa fa-industry fa-fw"></i>&nbsp; Workstation</a>
                                <a class="list-group-item" href="./index.php?id=add-measures">
                                <i class="fa fa-group fa-fw"></i>&nbsp; Add measures</a>
                                <a class="list-group-item" href="./index.php?id=add-user">
                                <i class="fa fa-user fa-fw"></i>&nbsp; Add User</a>
                            </div>
                        </div> -->
                        <div class="dropdown">
                            <a class="list-group-item" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog fa-fw"></i> Settings
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a> -->
                                <a class="list-group-item" href="./index.php?id=workstation">
                                <i class="fa fa-industry fa-fw"></i>&nbsp; Workstation</a>
                                <a class="list-group-item" href="./index.php?id=add-measures">
                                <i class="fa fa-balance-scale"></i>&nbsp; Add measures</a>
                                <a class="list-group-item" href="./index.php?id=add-user">
                                <i class="fa fa-group fa-fw"></i>&nbsp; Add User</a>
                            </div>
                        </div>
                        
                        <!-- <a class="list-group-item" href="./index.php?id=Report"> -->
                    </div>  
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="dashboard">
                    <?php 
                        require $content;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
