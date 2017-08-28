<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
$months = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
?>

        <!-- Mobile Device show menu button -->
<nav class="navbar-default home-nav nav-multi-color">
    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas" data-target="#side-menu"
            aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        Main Menu
    </button>


    <?php if ($this->session->userdata('type') == 6) { ?>

    <div class="row">
        <div class="panel col-xs-12 col-md-12 col-sm-12 col-lg-12"
             style="width:100%; color:white; background-color:#337ab7; margin-bottom:2px;">

            <div class="col-md-3 text-center">
                <span style="font-weight: bold; margin-top: 5px; display: block;">
                    <?php
                    $tempDate = date('Y-m-d g:i a');
                    $tmp = explode(' ', $tempDate);
                    $tmpDate = explode('-', $tmp[0]);
                    echo $months[(int)$tmpDate[1]-1];
                    echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[2]).',';
                    echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[0]).' ';
                   // echo ' '.str_replace(range(0,9),$bn_digits,$tmp[1]).' ';
                    if($tmp[2]=='am'){
                     //   echo 'এ এম';
                    }else{
                       // echo 'পি এম';
                    }
                    ?>
                </span>
            </div>
            <div class="col-md-6"
                 style="font-size:24px; margin-bottom:0px; color: black; font-weight: bold; text-align: center;">
                জেলা সমবায় কার্যালয়, <?= $admin_info[0]['bn_dist_name'] ?>।
            </div>

            <div class="col-md-3 col-xs-3" style="text-align: right">

                <a class="btn btn-danger logout-btn" href="index.php/logout_admin">লগ আউট</a>
            </div>
        </div>
    </div>
    <?php } elseif ($this->session->userdata('type') == 4) { ?>
    <div class="row">
        <div class="panel col-xs-12 col-md-12 col-sm-12 col-lg-12"
             style="width:100%; color:white; background-color:#337ab7; margin-bottom:2px;">

            <div class="col-md-3 text-center">
                <span style="font-weight: bold; margin-top: 5px; display: block;">
                    <?php
                    $tempDate = date('Y-m-d g:i a');
                    $tmp = explode(' ', $tempDate);
                    $tmpDate = explode('-', $tmp[0]);
                    echo $months[(int)$tmpDate[1]-1];
                    echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[2]).',';
                    echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[0]).' ';
                   // echo ' '.str_replace(range(0,9),$bn_digits,$tmp[1]).' ';
                    if($tmp[2]=='am'){
                     //   echo 'এ এম';
                    }else{
                       // echo 'পি এম';
                    }
                    ?>
                </span>
            </div>
            <div class="col-md-6"
                 style="font-size:24px; margin-bottom:0px; color: black; font-weight: bold; text-align: center;">
                আপীল সমবায় কার্যালয় , ঢাকা।
            </div>

            <div class="col-md-3 col-xs-3" style="text-align: right">

                <a class="btn btn-danger logout-btn" href="index.php/logout_admin">লগ আউট</a>
            </div>
        </div>
    </div>
    <?php } elseif ($this->session->userdata('type') == 5) { ?>
     <div class="row">
        <div class="panel col-xs-12 col-md-12 col-sm-12 col-lg-12"
             style="width:100%; color:white; background-color:#337ab7; margin-bottom:2px;">

            <div class="col-md-3 text-center">
                <span style="font-weight: bold; margin-top: 5px; display: block;">
                    <?php
                    $tempDate = date('Y-m-d g:i a');
                    $tmp = explode(' ', $tempDate);
                    $tmpDate = explode('-', $tmp[0]);
                    echo $months[(int)$tmpDate[1]-1];
                    echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[2]).',';
                    echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[0]).' ';
                   // echo ' '.str_replace(range(0,9),$bn_digits,$tmp[1]).' ';
                    if($tmp[2]=='am'){
                     //   echo 'এ এম';
                    }else{
                       // echo 'পি এম';
                    }
                    ?>
                </span>
            </div>
            <div class="col-md-6"
                 style="font-size:24px; margin-bottom:0px; color: black; font-weight: bold; text-align: center;">
                অভিযোগ সমবায় কার্যালয় , ঢাকা।
            </div>

            <div class="col-md-3 col-xs-3" style="text-align: right">

                <a class="btn btn-danger logout-btn" href="index.php/logout_admin">লগ আউট</a>
            </div>
        </div>
    </div>
    <?php } elseif ($this->session->userdata('type') == 7) { ?>
    <div class="row">
        <div class="panel col-xs-12 col-md-12 col-sm-12 col-lg-12"
             style="width:100%; color:white; background-color:#337ab7; margin-bottom:2px;">

            <div class="col-md-3 text-center">
                <span style="font-weight: bold; margin-top: 5px; display: block;">
                    <?php
                    $tempDate = date('Y-m-d g:i a');
                    $tmp = explode(' ', $tempDate);
                    $tmpDate = explode('-', $tmp[0]);
                        echo $months[(int)$tmpDate[1]-1];
                        echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[2]).',';
                        echo ' '.str_replace(range(0,9),$bn_digits,$tmpDate[0]).' ';
                       // echo ' '.str_replace(range(0,9),$bn_digits,$tmp[1]).'  ';
                        if($tmp[2]=='am'){
                          //  echo 'এ এম';
                        }else{
                            //echo 'পি এম';
                        }
                    ?>
                </span>
            </div>

            <div class="col-md-6"
                 style="font-size:24px; margin-bottom:0px; color: black; font-weight: bold; text-align: center;">উপজেলা
                সমবায়
                কার্যালয়, <?= $admin_info[0]['bn_upz_name'] ?>।
            </div>

            <div class="col-md-3 col-xs-3" style="text-align: right">

                <a class="btn btn-danger logout-btn" href="index.php/logout_admin">লগ আউট</a>
            </div>
        </div>
    </div>
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
                    <form enctype="multipart/form-data" class='form-horizontal' method='post'
                          action='<?php echo site_url('dco/upload_sign'); ?>'>
                        <div class='form-group'>
                            <label for="sign" class="col-sm-3 control-label">বর্তমান সাক্ষর</label>
                            <div class='col-md-8'>
                                <img src="<?php echo base_url() . 'uploads/sign/' . $admin_info[0]['sign']; ?>"
                                     alt="আপনার স্বাক্ষর নির্বাচন করুন"
                                     style="width: 150px; height: auto;"/>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for="sign" class="col-sm-3 control-label">সাক্ষর আপলোড</label>
                            <div class='col-md-8'>
                                <input required type="file" name='sign_up' id="imgInp"
                                       accept="image/gif">
                                <span>আপনার সাক্ষর টি ১৫০ x ৪০ pixels  এ আপলোড করুন </span>
                            </div>
                        </div>
                        <hr>
                        <div class='form-group'>
                            <div class='col-md-4 col-md-offset-4'>
                                <div class='col-md-6'>
                                    <button type='submit' class='btn btn-success'>আপলোড</button>
                                </div>
                                <div class='col-md-6'>
                                    <button type='button' data-dismiss="modal" class='btn btn-danger'>বাতিল</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


</nav>