<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">

        <div class="col-md-12 display-table-cell" id="main-content">
            <div class="row">
                <?php $this->load->view('layouts_uco_dco/secondary-nav');?>
                <div class="col-md-6 col-md-offset-3">

                </div><!-- /col6 -->

                <div class="col-md-10 col-md-offset-1" style="margin-top:50px;">
                    <div style="margin-bottom: 10px;">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url('uco')?>">হোম</a></li>
                            <li class="active">ফিডব্যাক</li>
                        </ol>
                    </div>
                    <div class="panel panel-success" style="border-color: #337ab7;">
                        <div class="panel-heading"
                             style="background-color: #337ab7; color: whitesmoke; border-color: #337ab7;">
                            <h4 class="heading-title"><?php echo $title;?></h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered data-table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style='width:5%;'>ক্রমিক নং</th>
                                    <th style="text-align: center;">সমবায়ের নাম</th>
                                    <th style="text-align: center;">সমবায়ের ট্র্যাকিং আইডি</th>
                                    <th style="text-align: center;">সংগঠকের আবেদন তারিখ</th>
                                    <th style="text-align: center;">জেলা কর্মকর্তার জিজ্ঞাসা</th>
                                    <th style="text-align: center;">উপজেলা কর্মকর্তার প্রতিক্রিয়া</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($feedbackSomitee as $key=>$feed){ ?>
                                <td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,($key+1))?></td>
                                <td><?= $feed['somitee_name']?></td>
                                <td style="text-align: center;"><?= $feed['somitee_track_id']?></td>
                                <td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,explode(' ',$feed['somitee_reg_date'])[0])?></td>
                                <td style="text-align: center;"><?= $feed['inquiry']?></td>
                                <td style="text-align: center;">
                                    <?php
                                    if($feed['type']==1 || $feed['reply']==''){ ?>
                                    <div style="margin: 5px; margin-bottom: 15px;">
                                        <a class="btn btn-info" onclick="replyFeedback('<?= $feed['somitee_id']?>','<?= $feed['somitee_name']?>','<?= $feed['id']?>')"
                                           style="cursor: pointer;">রিপ্লাই করুন</a>
                                    </div>
                                    <?php }else{
                                        echo $feed['reply'];
                                    }
                                    ?>
                                </td>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /panel -->
                </div>
            </div>

            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div> <!-- /col10 -->
    </div>
</div>
<!-- Modal -->
<div id="feedbackreply" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form action="<?= site_url('uco/feedback_post');?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">উপজেলা কর্মকর্তার প্রতিক্রিয়া</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label style="padding-top: 6px;" class="col-md-3">সমিতির
                                    নাম</label>
                                <div class="col-md-9">
                                    <select required name="somiteeID" id="somiteeID"
                                            class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ucoID" id="ucoID"
                               value="<?=$admin_info[0]['admin_reg_id']?>">
                        <input type="hidden" name="feedBackId" id="feedBackId" >
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label style="padding-top: 6px;"
                                       class="col-md-3">বিস্তারিত</label>
                                <div class="col-md-9">
                                                                <textarea required name="msg" id="msg" cols="30"
                                                                          class="form-control"
                                                                          rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ
                        করুন
                    </button>
                    <button type="submit" class="btn btn-success">সাবমিট করুন</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $this->load->view('layouts_uco_dco/footer'); ?>

<script>
    function replyFeedback(id,name,fdid) {
        console.log(fdid);
        $('#somiteeID').append('<option value="'+id+'">'+name+'</option>');
        document.getElementById('feedBackId').value=fdid;

        $('#feedbackreply').modal('show');
    }
</script>
