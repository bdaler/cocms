<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Categoria List</h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open('adminius/main/categoria',array('class'=>'form-inline'));?>
            <?php  echo validation_errors();?>
            <?php  echo $this->session->flashdata('msg'); ?>
            <?php  if(isset($categoria)):?>
            <div class="table-responsive">
            <table id="contentListTable" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">SubCategoriaId</th>
                        <th class="text-center">CategoriaUrl</th>
                    </tr>
                </thead>
                <?php foreach ($categoria as $value):?>
                    <tbody>
                        <tr>
                            <td><?php echo $value['id'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $this->myfunctions->getCategoriaNameById($value['parent_id']);?></td>
                            <td><?php echo $value['url'];?></td>
                        </tr>
                    </tbody>
                <?php endforeach;?>
            </table>
            </div>
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
    $('#subcategoria').change(function () {
        $('#selectsubcategoria').prop('disabled',!this.checked);
    });
});
</script>
