<?php //include ("layouts/header.php");  ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/division-sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav');?>
        
        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                	<h2>সমিতির তালিকা</h2>
                	<hr>
                </div><!-- /col -->
                <div class="col-md-12">
                	<table id="org-list-table" class="table table-striped table-bordered" cellspacing="0">
						<thead>
                            <tr>
                                <th>ক্রমিক</th>
                                <th style="text-align:center;">সমিতির  নাম </th>
                                <th>সমিতির প্রকার</th>
                                <th>রেজিস্ট্রেশন তারিখ</th>
                            </tr>
						</thead>
						<tbody>
                        <?php $i=1; foreach($somitee_info as $row) { ?>
                            <tr>
                                <td>
                                    <?php
                                    $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $output = str_replace(range(0, 9),$bn_digits, $i); 
                                    $i++;
                                    echo $output;
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('division/somitee_list_detail/'.$row['somitee_id']);?>"><?php echo $row['somitee_name'];?></a>
                                </td>
                                <td><?php echo $row['somitee_type_name'];?></td>
                                <td><?php echo $row['somitee_reg_date'];?></td>
                            </tr>
                            <?php } ?>
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

<?php //include("layouts/footer.php"); ?>
