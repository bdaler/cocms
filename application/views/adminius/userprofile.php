<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">User Profile</h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open('adminius/main/userprofile',array("class"=>"from-horizontal" ));?>
            <?php  echo validation_errors();?>
            <?php  echo $this->session->flashdata('msg'); ?>
            <form class="from-horizontal" role="form">
                <div class="col-md-4">
                    <fieldset class="form-group">
                        <label for="foremail">Email</label>
                        <input type="email" name="email" class="form-control" id="foremail" value="<?php set_value(print $this->myfunctions->getUinfo('email'));?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="forlogin">Login</label>
                        <input type="text" name="login" class="form-control" id="forlogin" value="<?php set_value(print $this->myfunctions->getUinfo('login'));?>">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="forpassword">Password</label>
                        <input type="text" id="password" name="password" class="form-control" id="forpassword" placeholder="Password">
                        <span class="help-block"><a href="javascript:passGen()">Generate Password</a></span>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="forpassconfirm">Confirm Password</label>
                        <input type="text" id="passconfirm" name="passconfirm" class="form-control" id="forpassconfirm" placeholder="Confirm Password">
                    </fieldset>
                    <input type="hidden" name="uid" value="<?php set_value(print $this->myfunctions->getUinfo('uid'));?>">
                    <button name="save" class="btn btn-primary" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div><!--row headerius-->
</div><!--container headerius-->
</div><!--section headerius-->
<script>
    function passGen(){
        var length = 8,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        $('#password').val(retVal);
        $('#passconfirm').val(retVal);
        return retVal
    }
</script>