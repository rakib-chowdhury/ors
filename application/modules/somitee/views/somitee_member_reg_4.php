<?php //include 'layouts/registered_user_header.php'; ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি নিবন্ধন ( সম্পূর্ণ )</h1>
        <form action="<?php echo site_url('somitee/somitee_member_registration_5'); ?>" method="post">
            <input type="hidden" name="somitee_id" value="<?php echo $s_info[0]['somitee_id'];?>">
            <input type="hidden" name="counter_val" value="<?php echo $commitee_no;?>">
            <table class="table table-bordered">
                <?php for ($i = 0; $i < $commitee_no; $i++) { ?>
                    <tr>
                        <td>
                            <select required onclick="des_val(<?php echo $i; ?>,<?php echo $commitee_no; ?>)"
                                    name="des_<?php echo $i; ?>"
                                    id="des_<?php echo $i; ?>" class="form-control">
                                <option>--</option>
                                <?php foreach ($member_designation as $row) { ?>
                                    <option
                                        value="<?php echo $row['designation_id']; ?>"><?php echo $row['designation_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select required onclick="mem_val(<?php echo $i; ?>,<?php echo $commitee_no; ?>)"
                                    name="mem_<?php echo $i; ?>" id="mem_<?php echo $i; ?>" class="form-control">
                                <option>--</option>
                                <?php foreach ($somitee_member_info as $row) { ?>
                                    <option
                                        value="<?php echo $row['somitee_member_id']; ?>"><?php echo $row['somitee_member_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                <?php } ?>
            </table>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-success btn-raised">কন্টিনিউ &rarr;</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>
    function des_val(count_val, total_counter) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_designation');?>',
            data: {
                type: 2
            },
            success: function (data) {
                // console.log(data);
                data1 = $.parseJSON(data);
                for (c = (count_val + 1); c < total_counter; c++) {
                    $('#des_' + c + ' option:gt(0)').remove();
                }
                //var fruits = ["Apple", "Orange", "Donkey"]
                var r_val = [''];
                for (c1 = 0; c1 <= count_val; c1++) {
                    var t = $('#des_' + c1).val();
                    r_val.push(t);
                }
                $.each(data1['res'], function (index, value) {
                    var a_dd = true;
                    r_val.forEach(function (entry) {
                        var remove_val = entry;
                        if (remove_val == value['designation_id']) {
                            a_dd = false;
                        }
                    });
                    if (a_dd == true) {
                        var des_value = '<option value="' + value['designation_id'] + '">' + value['designation_name'] + '</option>';
                        console.log(value['designation_id']);
                        for (c = (count_val + 1); c < total_counter; c++) {
                            $('#des_' + c).append(des_value);
                        }
                    }

                });
            }
        });

    }

    function mem_val(count_val, total_counter) {
        var id=<?php echo $s_info[0]['somitee_id'];?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('somitee/get_mem');?>',
            data: {
                somitee_id: id
            },
            success: function (data) {
                // console.log(data);
                data1 = $.parseJSON(data);
                for (c = (count_val + 1); c < total_counter; c++) {
                    $('#mem_' + c + ' option:gt(0)').remove();
                }
                //var fruits = ["Apple", "Orange", "Donkey"]
                var r_val = [''];
                for (c1 = 0; c1 <= count_val; c1++) {
                    var t = $('#mem_' + c1).val();
                    r_val.push(t);
                }
                $.each(data1['res'], function (index, value) {
                    var a_dd = true;
                    r_val.forEach(function (entry) {
                        var remove_val = entry;
                        if (remove_val == value['somitee_member_id']) {
                            a_dd = false;
                        }
                    });
                    if (a_dd == true) {
                        var mem_value = '<option value="' + value['somitee_member_id'] + '">' + value['somitee_member_name'] + '</option>';
                        //console.log(value['somitee_member_id']);
                        for (c = (count_val + 1); c < total_counter; c++) {
                            $('#mem_' + c).append(mem_value);
                        }
                    }

                });
            }
        });

    }

</script>
