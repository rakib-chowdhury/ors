<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $somitee_info['0']['somitee_name']; ?></h2>
                    <hr>
                </div><!-- /col -->

                <!-- TAB -->
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                  data-toggle="tab">সমিতি সম্পর্কিত তথ্য</a></li>
                        <li role="presentation"><a href="#wysiwyg-edit" aria-controls="wysiwyg-edit" role="tab"
                                                   data-toggle="tab">মন্তব্য করুন </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="panel panel-default col-md-8 col-md-offset-2">
                                <div class="panel-body">
                                    <h3>
                                        <span>সমিতির নামঃ </span>
                                        <?php echo $somitee_info['0']['somitee_name']; ?>
                                    </h3>
                                    <table class="table table-striped table-bordered" cellspacing="0">
                                        <tr>
                                            <td>সমিতির ধরণ</td>
                                            <td><b><i><?php echo $somitee_info['0']['somitee_type_name']; ?></i></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>সমিতির প্রকার</td>
                                            <td><b><i><?php echo $somitee_info[0]['somitee_cat_name']; ?></i></b></td>
                                        </tr>
                                        <tr>
                                            <td>সমিতির ঠিকানা</td>
                                            <td>
                                                <b><i><?php echo $somitee_info[0]['somitee_address'] . ' , ' . $somitee_info[0]['bn_upz_name'] . ' , ' . $somitee_info[0]['bn_dist_name'] . ' , ' . $somitee_info[0]['bn_div_name']; ?></i></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>সমিতির কর্ম এলাকা</td>
                                            <td>
                                                <b><i><?php echo $somitee_info[0]['k_upz_name'] . ' , ' . $somitee_info[0]['k_dist_name'] . ' , ' . $somitee_info[0]['k_div_name']; ?></i></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>সমিতির মোট শেয়ার</td>
                                            <td><b><i><?php echo $somitee_info[0]['somitee_share']; ?></i></b></td>
                                        </tr>
                                        <tr>
                                            <td>সমিতি শেয়ার মূল্য</td>
                                            <td><b><i><?php echo $somitee_info[0]['somitee_per_share_price']; ?></i></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>সমিতির উদ্দেশ্য</td>
                                            <td><b><i><?php echo $somitee_info[0]['somitee_purpose']; ?></i></b></td>
                                        </tr>
                                        <tr>
                                            <td>সমিতির রেজিস্ট্রেশন তারিখ</td>
                                            <td><b><i><?php echo $somitee_info[0]['somitee_reg_date']; ?></i></b></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div><!-- /tabpanel -->


                        <div role="tabpanel" class="tab-pane" id="wysiwyg-edit">
                            <form action="<?php echo site_url('division/get_div_work'); ?>" method="post">
                                <div>
                                    <input type="hidden" name="somitee_id"
                                           value="<?php echo $somitee_info[0]['somitee_id'] ?>">
                                    <textarea onblur="get_editor_val()" class="summernote" name="comment"></textarea>
                                </div>
                                <div>
                                    <label>slmitee status</label>
                                    <input type="radio" name="somitee_status" value="1">Accept
                                    <input type="radio" name="somitee_status" value="2">Suggesion
                                    <input type="radio" name="somitee_status" value="3">Reject
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success gnt-btn save-btn">সেভ ডকুমেন্ট</button>
                                </div>
                            </form>
                        </div> <!-- /tabpanel -->

                    </div> <!-- /tabcontent -->
                </div> <!-- /col -->
            </div> <!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>
<script>

    function get_editor_val() {

    }


</script>
