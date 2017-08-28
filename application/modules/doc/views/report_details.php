<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">

                        <form id="report_form" action="<?php echo site_url('doc/report_post');?>" method="post">

                            <div class="panel panel-hover table-responsive">
                                <h2 align="center">নিবন্ধন প্রতিবেদন</h2>
                                <hr>
                                <div class="form-group" style="padding-bottom: 50px;">
                                    <div class="form-group">
                                        <table class="col-md-10 col-md-offset-1">
                                            <tr>
                                                <td>সময়</td>
                                                <td style="width: 30%; padding-left: 10px;">
                                                    <input required type="text" name="start_date" id="start_date"
                                                           class="form-control">
                                                </td>
                                                <td style="width: 5%; padding-left: 10px; text-align:center;">হতে</td>
                                                <td style="width: 30%; padding-left: 10px;">
                                                    <input required type="text" name="end_date" id="end_date"
                                                           class="form-control">
                                                </td>
                                                <td style="padding-left: 10px;">
                                                    <input onclick="report_submit()" type="button"
                                                           class="btn btn-primary"
                                                           value="অনুসন্ধান">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div id="err_msg" style="text-align:center ; display: none;"
                                     class="alert alert-danger form-group col-md-4 col-md-offset-3">
                                    <p>সঠিকভাবে তারিখ নির্বাচন করুন</p>
                                </div>

                                <br>
                                <div class="panel panel-body">

                                </div>

                            </div>
                        </form>


                    </div>
                </div>
            </div>
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

    //$('#err_msg').hide();
    function report_submit() {
        var tmp_date = $('#end_date').val();
        var tmp_date1 = $('#start_date').val();
        date_diff = (new Date(tmp_date) - new Date(tmp_date1)) / 1000 / 60 / 60 / 24;

        if (tmp_date == '' || tmp_date == null || tmp_date1 == '' || tmp_date1 == null || date_diff < 0) {
            //$('#err_msg').show();
            msg=document.getElementById('err_msg');
            msg.style.display='block';
            console.log(tmp_date); console.log(tmp_date1); console.log(date_diff);
        } else {
            $('#err_msg').hide();
            $('#report_form').submit();
        }
    }
</script>
