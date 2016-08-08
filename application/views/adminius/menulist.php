<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Menu List</h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open('adminius/main/menu',array('class'=>'form-inline'));?>
            <?php  echo validation_errors();?>
            <?php  echo $this->session->flashdata('msg'); ?>
            <?php  if(isset($menu)):?>
                <table id="contentListTable" class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Menu</th>
                        <th class="text-center">Paren_id</th>
                        <th class="text-center">Url</th>
                    </tr>
                    </thead>
                    <?php foreach ($menu as $value):?>
                        <tbody>
                        <tr>
                            <td><?php echo $value['id'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $this->myfunctions->getMenuNameById($value['parent_id']);?></td>
                            <td><?php echo $value['url'];?></td>
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
