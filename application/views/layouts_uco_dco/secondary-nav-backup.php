<!-- Mobile Device show menu button -->
<nav class="navbar-default home-nav">
    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        Main Menu
    </button>
    <?php if ($this->session->userdata('type') == 6) { ?>
        <ul class="list-unstyled list-inline pull-right home-nav-btn">
            <li>
                <a href="index.php/dco">
                    <button class="btn btn-primary gnt-btn">অনুসন্ধান</button>
                </a>
            </li>
            <li>
                <a href="index.php/dco/all_somitee_list">
                    <button class="btn btn-primary gnt-btn">সকল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="index.php/dco/new_somitee_list">
                    <button class="btn btn-primary gnt-btn">নতুন আবেদন</button>
                </a>
            </li>
            <li>
                <a href="index.php/dco/appeal_somitee_list">
                    <button class="btn btn-primary gnt-btn">আপীল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="index.php/dco/success_somitee_list">
                    <button class="btn btn-primary gnt-btn">সফল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="index.php/dco/reject_somitee_list">
                    <button class="btn btn-primary gnt-btn">বাতিল আবেদন</button>
                </a>
            </li>
            <li>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary gnt-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        সেটিংস <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('dco/index/profile');?>">প্রোফাইল</a></li>
                        <li><a data-toggle="modal"  data-target="#myModal">সাইন আপলোড </a></li>
                        <li><a data-toggle="modal" data-target="#myModal_pass_dco" href="#">পাসওয়ার্ড পরিবর্তন</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php/logout_admin">লগ আউট</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    <?php }elseif ($this->session->userdata('type') == 4) { ?>
        <ul class="list-unstyled list-inline pull-right home-nav-btn">
            <li>
                <a href="<?php echo site_url('appeal');?>">
                    <button class="btn btn-primary gnt-btn">অনুসন্ধান</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('appeal/get_somitee/all');?>">
                    <button class="btn btn-primary gnt-btn">সকল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('appeal/get_somitee/new');?>">
                    <button class="btn btn-primary gnt-btn">নতুন আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('appeal/get_somitee/selected');?>">
                    <button class="btn btn-primary gnt-btn">সফল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('appeal/get_somitee/reject');?>">
                    <button class="btn btn-primary gnt-btn">বাতিল আবেদন</button>
                </a>
            </li>            
            <li>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary gnt-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        সেটিংস <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('appeal/index/profile');?>">প্রোফাইল</a></li>
                        <li><a data-toggle="modal" data-target="#myModal_pass" href="#">পাসওয়ার্ড পরিবর্তন</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php/logout_admin">লগ আউট</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    <?php }elseif ($this->session->userdata('type') == 5) { ?>
        <ul class="list-unstyled list-inline pull-right home-nav-btn">
            <li>
                <a href="<?php echo site_url('complain');?>">
                    <button class="btn btn-primary gnt-btn">অনুসন্ধান</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('complain/get_somitee/all');?>">
                    <button class="btn btn-primary gnt-btn">সকল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('complain/get_somitee/new');?>">
                    <button class="btn btn-primary gnt-btn">নতুন আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('complain/get_somitee/selected');?>">
                    <button class="btn btn-primary gnt-btn">রিপ্লাইকৃত আবেদন</button>
                </a>
            </li>            
            <li>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary gnt-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        সেটিংস <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('complain/index/profile');?>">প্রোফাইল</a></li>
                        <li><a data-toggle="modal" data-target="#myModal_pass" href="#">পাসওয়ার্ড পরিবর্তন</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php/logout_admin">লগ আউট</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    <?php }elseif ($this->session->userdata('type') == 7) { ?>
        <ul class="list-unstyled list-inline pull-right home-nav-btn">
            <li>
                <a href="<?php echo site_url('uco');?>">
                    <button class="btn btn-primary gnt-btn">অনুসন্ধান</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('uco/get_somitee/all');?>">
                    <button class="btn btn-primary gnt-btn">সকল আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('uco/get_somitee/new');?>">
                    <button class="btn btn-primary gnt-btn">নতুন আবেদন</button>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('uco/get_somitee/selected');?>">
                    <button class="btn btn-primary gnt-btn">সফল আবেদন</button>
                </a>
            </li>            
            <li>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary gnt-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        সেটিংস <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('uco/index/profile');?>">প্রোফাইল</a></li>
                        <li><a data-toggle="modal" data-target="#myModal_pass" href="#">পাসওয়ার্ড পরিবর্তন</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php/logout_admin">লগ আউট</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    <?php }
 ?>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">সাক্ষর আপলোড</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" class='form-horizontal' method='post' action='<?php echo site_url('dco/upload_sign');?>'>
                     <div class='form-group'>
                        <label for="sign" class="col-sm-3 control-label">বর্তমান সাক্ষর</label>
                        <div class='col-md-8'>
                            <img src="<?php echo base_url().'uploads/sign/'.$admin_info[0]['sign']; ?>"
                             alt="আপনার স্বাক্ষর নির্বাচন করুন"
                             style="width: 150px; height: auto;"/>
                        </div>
                     </div>
                     <div class='form-group'>
                        <label for="sign" class="col-sm-3 control-label">সাক্ষর আপলোড</label>
                        <div class='col-md-8'>
                            <input required type="file" name='sign_up' id="imgInp" accept="image/gif, image/jpeg, image/png">
                            <span>আপনার সাক্ষর টি ১৫০ x ৪০ pixels  এ আপলোড করুন </span>
                        </div>
                     </div>
                     <hr>
                     <div class='form-group'>
                          <div class='col-md-4 col-md-offset-4'>
                               <div class='col-md-6'><button type='submit' class='btn btn-success'>আপলোড</button></div>
                               <div class='col-md-6'><button type='button' data-dismiss="modal" class='btn btn-danger'>বাতিল </button></div>
                          </div>
                     </div>
                </form>
            </div>
            
        </div>
    </div>
</div>


    
</nav>