<?php //include 'layouts/registered_user_header.php';     ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">প্রস্তাবিত সমবায় নিবন্ধনের প্রাথমিক আবেদন</h1>
        <form method="post" action="<?php echo site_url('somitee/somitee_registration_post'); ?>" class="form-horizontal panel reg-form-2">
            <input type="hidden" name="s_reg2" value="1">


            
            <?php //echo $share_price;?>
            <?php //echo $share_qty;?>
            <?php //echo $sell_share_num;?>


            <fieldset>
                <legend>সমবায়ের সদস্য সংখ্যা</legend>
                <div class="form-group">
                    <label for="org_mem_qty" class="col-md-4 control-label">সদস্য সংখ্যা</label>
                    <div class="col-md-8">
                        <!-- <input type="hidden" name="mem_update[]" value="1"> -->
                        <input onkeyup="addFields()" onchange="addFields()" type="text" name="member" id="member2" class="form-control" required>
                        <span class="help-block">আবশ্যক। কমপক্ষে ২০ জন হতে হবে।</span>
                    </div>
                </div>
                <div id="container" align="center;" style="margin:50px;margin-left:150px;" class="table">
                    <table class="">
                    <tr style="margin-top:100px">
                        <thstyle="margin:50px></th>
                        <th></th>
                    </tr>
                    </table>
                </div>
            </fieldset> <br>

            <fieldset>
                <legend>সমিতি গঠনের উদ্দেশ্য</legend>
                <hr>
                <div class="form-group">
                    <div class="col-md-12">
<p id="wordCount" class="pull-right">0/250 শব্দ</p>
                        <textarea name="purpose" id="purpose" rows="5" class="form-control"
                                  placeholder="সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন" required></textarea>

                        <span class="help-block">সমিতি গঠন কিভাবে সদস্যদের আর্থ সামাজিক অবস্থার উন্নয়নে ভূমিকা রাখাবে তা ২৫০ শব্দের মধ্যে ব্যখ্যা করুন</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="lst_chk" id='lst_chk' required > উপরের প্রদত্ত সকল তথ্য সঠিক
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <a href="<?php echo site_url('somitee/somitee_registration'); ?>"
                           class="btn btn-default btn-raised pull-right btn-block">&larr; পূর্বের পৃষ্ঠা সংশোধন করুন</a>
                    </div>
                    <div class="col-md-4">
                        <button name="btn_val" value="save" class="btn btn-primary btn-raised pull-left btn-block" type="submit">
                            সাবমিট করুন
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>
<script>


    function addFields() {
        var tmp_number = document.getElementById("member2").value;

        var banToeng={'০': 0,'১': 1,'২': 2,'৩': 3,'৪': 4,'৫': 5,'৬': 6,'৭': 7,'৮': 8,'৯': 9};
        String.prototype.getbngToeng = function() {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_number=''+tmp_number+'';
        console.log(bng_number);
        var number=bng_number.getbngToeng();
        console.log(number);


        if (number >= 20 && number<=500) {
            addFields1(number);
        } else {
            $('#container').hide();
        }
    }

    function addFields1(num) {
        var number = num;//document.getElementById("member2").value;
        var container = document.getElementById("container");
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        for (i = 0; i < number; i++) {
            container.appendChild(document.createTextNode( " "  + " সদস্য " + ( i + 1) + " " + " " + " "));
            var input = document.createElement("input");
            input.type = "text";
            input.name = "mem[]";
            input.required= 'required';
            input.style = "margin-bottom:20px;";
            container.appendChild(input);
            container.appendChild(document.createElement("br"));
        }
        $('#container').show();
    }

counter = function(e) {
    var value = $('#purpose').val();

    if (value.length == 0) {
        $('#wordCount').html(0+'/250 শব্দ');
        return;
    }

   // var regex = /\s+/gi;
    var wordCount = value.split(' ').length;

    $('#wordCount').html(wordCount+'/250 শব্দ');

if(wordCount > 250){
var count = $('#purpose').val().length;
$("#purpose").get(0).setAttribute("maxlength", count);
}
if(wordCount < 250){
$("#purpose").removeAttr("maxlength");
}
};

$(document).ready(function() {
    $('#purpose').change(counter);
    $('#purpose').keydown(counter);
    $('#purpose').keypress(counter);
    $('#purpose').keyup(counter);
    $('#purpose').blur(counter);
    $('#purpose').focus(counter);
});

</script>