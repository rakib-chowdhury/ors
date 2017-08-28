<?php //include ("layouts/header.php");  ?>
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
                <div class="col-md-12">
                    <h2>সমিতি সম্পর্কিত তথ্য</h2>
                    <hr>
                </div><!-- /col -->
                <div class="col-md-12">
                    <table id="about-org" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th>সমিতির নাম	</th>
                                <th>type</th>
                                <th>Status</th>
                                <th>time remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($somitee_list as $row){?>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('dco/view_somitee/'.$row['somitee_id']); ?>"><?php echo $row['somitee_name'];?></a>
                                </td>
                                <td><?php echo $row['somitee_type_name'];?></td>
                                <td><?php  
                                    $status=$row['somitee_status'];
                                    if($status==2){
                                        echo 'On Going';
                                    }elseif($status==3){
                                        echo 'decline';
                                    }elseif($status==4){
                                        echo 'Appeal';
                                    }elseif($status==1){
                                        echo $status;
                                    } 
                                    ?></td>
                                <td><?php echo $row['somitee_reg_date'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div><!-- /col -->
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php // include("layouts/footer.php"); ?>
