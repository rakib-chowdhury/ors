<div class="col-md-2 hidden-xs display-table-cell" id="side-menu">
    <?php if ($this->session->userdata('type') == 3) { ?>
        <ul>
            <li class="link active">
                <a href="<?php echo site_url('division') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>


            <li class="link">
                <a href="<?php echo site_url('division/all_somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>
        </ul>
    <?php } elseif ($this->session->userdata('type') == 6) { ?>
        <ul>
            <li class="link active">
                <a href="<?php echo site_url('dco') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>


            <li class="link">
                <a href="<?php echo site_url('dco/somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>
        </ul>

    <?php }elseif ($this->session->userdata('type') == 4) { ?>
        <ul>
            <li class="link active">
                <a href="<?php echo site_url('appeal') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>


            <li class="link">
                <a href="<?php echo site_url('appeal/all_somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>
        </ul>
    <?php }elseif ($this->session->userdata('type') == 5) { ?>
        <ul>
            <li class="link active">
                <a href="<?php echo site_url('complain') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>


            <li class="link">
                <a href="<?php echo site_url('complain/all_somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>
        </ul>
    <?php }elseif ($this->session->userdata('type') == 7) { ?>
        <ul>
            <li class="link active">
                <a href="<?php echo site_url('uco') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>


            <li class="link">
                <a href="<?php echo site_url('uco/all_somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>
        </ul>
    <?php }elseif ($this->session->userdata('type') == 2) { ?>

        <ul>
            <li class="link active">
                <a href="<?php echo site_url('doc') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>
           <!-- <li class="link">
                <a href="<?php echo site_url('doc/leader_info'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">প্রোফাইল</span>
                </a>
            </li>-->
            <li class="link">
                <a href="<?php echo site_url('doc/report'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">প্রতিবেদন</span>
                </a>
            </li>
            <li class="link">
                <a href="#collapse-emp" data-toggle="collapse" aria-controls="collapse-emp">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    <span class="hidden-sm">কর্মকর্তা / কর্মচারীর তথ্য</span>
                    <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                </a>
                <ul class="collapse collapseable" id="collapse-emp">
                    <li>
                        <a href="<?php echo site_url('doc/register_employee'); ?>">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span>নতুন কর্মকর্তা / কর্মচারী </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('doc/employee_list'); ?>">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span>কর্মকর্তা / কর্মচারীর তালিকা</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="link">
                <!--            <a href="<?php echo site_url('doc/employee_designation_change'); ?>">-->
                <a href="<?php echo site_url('doc/employee_list/1'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">পদবী পরিবর্তন</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('doc/employee_list/1'); ?>">
                    <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                    <span class="hidden-sm">বদলি ব্যবস্থাপনা</span>
                </a>
            </li>

            <!--<li class="link">
                <!--<a href="<?php echo site_url('doc/somitee_list'); ?>">-->
              <!-- <a href="<?php echo site_url('doc/all_somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>-->
            
            <li class="link">
                <a href="<?php echo site_url('doc/sms_api'); ?>">
                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                    <span class="hidden-sm">এস.এম.এস</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('doc/upz_block'); ?>">
                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                    <span class="hidden-sm">সমবায় এলাকা অনুমোদন</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('doc/all_opinion'); ?>">
                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                    <span class="hidden-sm">মতামত</span>
                </a>
            </li>
            <li class="link">
                <a href="http://geeksntechnology.com/ors/">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">সমবায় অধিদপ্তর</span>
                </a>
            </li>
             <li class="link">
                <a href="<?php echo site_url('doc/all_notice') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">নোটিশ</span>
                </a>
            </li>
        </ul>
    <?php }

elseif ($this->session->userdata('type') == 1) { ?>

        <ul>
            <li class="link active">
                <a href="<?php echo site_url('services') ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">ড্যাশবোর্ড</span>
                </a>
            </li>
            <li class="link">
                <a href="#collapse-emp" data-toggle="collapse" aria-controls="collapse-emp">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    <span class="hidden-sm">কর্মকর্তা / কর্মচারীর তথ্য</span>
                    <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                </a>
                <ul class="collapse collapseable" id="collapse-emp">
                    <li>
                        <a href="<?php echo site_url('doc/register_employee'); ?>">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span>নতুন কর্মচারী/ কর্মকর্তা</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('doc/employee_list'); ?>">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <span>সকল কর্মকর্তা/কর্মচারীর তালিকা</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="link">
                <!--   <a href="<?php echo site_url('doc/employee_designation_change'); ?>">   -->
                <a href="<?php echo site_url('services/sms_list'); ?>">
                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                    <span class="hidden-sm">SMS LIST</span>
                </a>
            </li> 
            <li class="link">
                <a href="<?php echo site_url('doc/employee_list/1'); ?>">
                    <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                    <span class="hidden-sm">বদলি ব্যবস্থাপনা</span>
                </a>
            </li>

           <!-- <li class="link">-->
                <!--<a href="<?php echo site_url('doc/somitee_list'); ?>">-->
         <!--       <a href="<?php echo site_url('doc/all_somitee_list'); ?>">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি সম্পর্কিত তথ্য</span>
                </a>
            </li>

            <li class="link">
                <a href="#">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">সমিতি প্রধানের তালিকা</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('doc/sms_api'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">এস.এম.এস এ.পি.আই</span>
                </a>
            </li> -->
            <li class="link">
                <a data-toggle="modal" data-target="#siteUpdate">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">Site Update</span>
                </a>
            </li>
            <!-- Modal -->
<div id="siteUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">

<form action="<?= site_url().'services/site_update_post'?>" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Site Update</h4>
      </div>
      <div class="modal-body">
        <label>Date</label>
        <input required type="date" name='siteUp' id='siteUp' value='<?= $lstUp[0]['last_update']?>'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Update</button>
      </div>
    </div>
</form>
  </div>
</div>
        </ul>
    <?php }

 ?>
</div><!-- /sidebar col-md-2 -->