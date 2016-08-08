<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Users List</h3>
        </div>
        <div class="panel-body">
            <?php  //echo form_open('adminius/main/menu',array('class'=>'form-inline'));?>
            <?php  //echo validation_errors();?>
            <?php  //echo $this->session->flashdata('msg'); ?>
            <?php  if(isset($Users)):?>
                <table id="contentListTable" class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Login</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <?php foreach ($Users as $value):?>
                        <tbody>
                        <tr>
                            <td><?php echo $value->getUid();?></td>
                            <td><?php echo $value->getUemail();?></td>
                            <td><?php echo $value->getUlogin();?></td>
                            <td><?php echo $value->getUstate();?></td>
                        </tr>
                        </tbody>
                    <?php endforeach;?>
                </table>
                <?php echo $links;?>
            <?php endif;?>

        </div>
    </div>
</div>
</div><!--row headerius-->
</div><!--container headerius-->
</div><!--section headerius-->
<script>
    $(document).ready(function () {
        $('#submenu').change(function () {
            $('#selectsubmenu').prop('disabled',!this.checked);
        });
    });
</script>
