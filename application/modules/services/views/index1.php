<?php //include ("layouts/header.php"); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php $this->load->view('layouts/sidebar-nav');?>
        
        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
               <?php $this->load->view('layouts/secondary-nav');?>
                <h2 class="text-center hidden-sm hidden-xs">ড্যাশবোর্ড ব্যবস্থাপনায় আপনাকে স্বাগতম</h2>
                <div class="col-md-7">
                        <table class="table table-bordered profile">
                            <tr>
                                <th>নাম</th>
                                <td>মিজানুর রহমান</td>
                            </tr>
                            <tr>
                                <th>এন, আই, ডি</th>
                                <td>23423423423432</td>
                            </tr>
                            <tr>
                                <th>পদবী</th>
                                <td>DOC Admin</td>
                            </tr>
                        </table>

                        <div class="welcome">
                            <div class="welcome-msg">
                                <h3 class="text-center">বিভাগীয় সমিতি সম্পর্কিত তথ্য দেখুন</h3>
                                <ul class="list-unstyled list-inline">
                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==1) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/1" class="gnt-actn-btn btn-success">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>ঢাকা</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>

                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==4) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/4" class="gnt-actn-btn btn-warning">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>রাজশাহী</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>

                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==8) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/8" class="gnt-actn-btn btn-danger">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>ময়মনসিংহ</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>

                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==3) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/3" class="gnt-actn-btn btn-primary">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>চট্টগ্রাম</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="list-unstyled list-inline">
                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==5) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/5" class="gnt-actn-btn btn-primary">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>বরিশাল</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>

                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==2) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/2" class="gnt-actn-btn btn-danger">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>খুলনা</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>

                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==6) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/6" class="gnt-actn-btn btn-warning">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>সিলেট</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>
                                    <li>
                                     <?php $result=0; foreach($somitee_info as $row) {?>
                                           <?php if($row['somitee_div_id']==7) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <a href="index.php/doc/somitee_list_by_div/7" class="gnt-actn-btn btn-success">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span>রংপুর</span>
                                            <?php if($result>0) {?>
                                            <span class="badge1"><?=$result;?></span>
                                            <?php } else {?>
                                            <span></span>
                                            <?php }?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <div class="col-md-4">
                    <table class="table table-bordered sms-counter">
                            <tr>
                                <th colspan="2" class="text-center">এস, এম, এস</th>
                            </tr>
                            <tr>
                                <th>মজুদ আছে</th>
                                <td><?php $result = $sms_info['0']['total_sms_number']-$sms_info['0']['send_sms_number']; echo $result;?></td>
                            </tr>
                            <tr>
                                <th>পাঠানো হয়েছে</th>
                                <td><?=$sms_info['0']['send_sms_number']?></td>
                            </tr>
                        </table>

                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                    <script type="text/javascript">
                        window.onload = function () {
                            var chart = new CanvasJS.Chart("chartContainer",
                            {
                                theme: "theme2",
                                title:{
                                    text: ""
                                },
                                data: [
                                {
                                    type: "pie",
                                    showInLegend: true,
                                    toolTipContent: "{y} - #percent %",
                                    yValueFormatString: "#0.#",
                                    legendText: "{indexLabel}",
                                    dataPoints: [
                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==1) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "ঢাকা" },

                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==4) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "রাজশাহী" },

                                        {  y:
                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==8) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>

                                        <?=$result;?> , indexLabel: "ময়মনসিংহ" },

                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==3) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "চট্টগ্রাম"},

                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==5) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "বরিশাল" },

                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==2) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "খুলনা"},

                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==6) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "সিলেট"},

                                        {  y:

                                         <?php $result=0; foreach($somitee_all_info as $row) {?>
                                           <?php if($row['somitee_div_id']==7) { ?>
                                            <?php $result+= count($row['somitee_div_id']);?>
                                           <?php }?> 
                                        <?php }?>
                                        <?=$result;?> , indexLabel: "রংপুর"}
                                    ]
                                }
                                ]
                            });
                            chart.render();
                        }
                    </script>
                </div>
                
                </div>
            <div class="slide-out-div">
                <a href="" class="handle"></a>
                <h3>নোটিফিকেশন</h3>
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
