<?php //include ("layouts/header.php"); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav');?>
        
        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <?php //include ('layouts/secondary-nav.php'); ?>
                <?php $this->load->view('layouts/secondary-nav');?>
                <div class="welcome">
                    <div class="welcome-msg">
                        <h1 class="text-center">ড্যাশবোর্ড ব্যবস্থাপনায় আপনাকে স্বাগতম</h1>
                        <ul class="list-unstyled list-inline">
                            <li>
                                <a href="" class="gnt-actn-btn btn-primary">
                                    <i class="glyphicon glyphicon-check"></i>
                                    <span>Actn Button</span>
                                </a>
                            </li>

                            <li>
                                <a href="" class="gnt-actn-btn btn-success">
                                    <i class="glyphicon glyphicon-check"></i>
                                    <span>Actn Button</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="gnt-actn-btn btn-warning">
                                    <i class="glyphicon glyphicon-check"></i>
                                    <span>Actn Button</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="gnt-actn-btn btn-danger">
                                    <i class="glyphicon glyphicon-check"></i>
                                    <span>Actn Button</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="slide-out-div">
                <a href="" class="handle"></a>
                <h3>Notifications</h3>
                <ul class="list-unstyled content">
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                    <li>
                        <a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                    </li>
                </ul>
            </div>
            
                <div class="row">
                        <footer id="admin-footer">
                            <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                        </footer>
                </div><!-- /row -->
            </div> <!-- /col10 -->
        </div><!-- /row -->
</div> <!-- /container-fluid -->

            
<?php //include("layouts/footer.php"); ?>

