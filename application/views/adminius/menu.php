<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Add Menu</h3>
        </div>
        <div class="panel-body">
            <?php  echo form_open('adminius/main/menu',array('class'=>'form-inline'));?>
            <?php  echo validation_errors();?>
            <?php  echo $this->session->flashdata('msg'); ?>
            <?php  if(isset($menu)):?>
             <form class="form-inline" role="form">
                <label class="content" for="createMenu">Пукт меню: </label>
                <input type="text" class="form-control" id="createMenu" name="menu" placeholder="Название меню" onchange="urltranslit()">
                <label><input id="submenu" name="submenu" type="checkbox"> isSubMenu </label>
                <select id="selectsubmenu" name="selectsubmenu" disabled>
                <?php foreach ($menu as $value ):?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                <?php endforeach;?>
                </select>
                 <input type="text" class="form-control" name="url" id="url" readonly>
                 <button type="submit" name="addMenu" class="btn btn-default">Добавить Меню</button>
            </form>
            <table id="contentListTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Menu</th>
                        <th>SubMenuID</th>
                        <th>MenuUrl</th>
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
function translit(str){
    var sp = '-';
    var text = str.toLowerCase();
    var transl = {
        '\u0430': 'a', '\u0431': 'b', '\u0432': 'v', '\u0433': 'g', '\u0434': 'd', '\u0435': 'e', '\u0451': 'e', '\u0436': 'zh',
        '\u0437': 'z', '\u0438': 'i', '\u0439': 'j', '\u043a': 'k', '\u043b': 'l', '\u043c': 'm', '\u043d': 'n', '\u043e': 'o',
        '\u043f': 'p', '\u0440': 'r', '\u0441': 's', '\u0442': 't', '\u0443': 'u', '\u0444': 'f', '\u0445': 'h', '\u0446': 'c',
        '\u0447': 'ch', '\u0448': 'sh', '\u0449': 'shch', '\u044a': '\'', '\u044b': 'y', '\u044c': '', '\u044d': 'e', '\u044e': 'yu',
        '\u044f': 'ya',
        '\u00AB':'_', '\u00BB':'_', // «»
        ' ': sp, '_': sp, '`': sp, '~': sp,
        '!': sp, '@': sp, '#': sp, '$': sp,
        '%': sp, '^': sp, '&': sp, '*': sp, '(': sp, ')': sp, '-': sp, '\=': sp,
        '+': sp, '[': sp, ']': sp, '\\': sp, '|': sp, '/': sp, '.': sp, ',': sp,
        '{': sp, '}': sp, '\'': sp, '"': sp, ';': sp, ':': sp, '?': sp, '<': sp,
        '>': sp, '№': sp
    }
    var result = '';
    var curent_sim = '';
    for(i=0; i < text.length; i++) {
        if(transl[text[i]] != undefined) {
            if(curent_sim != transl[text[i]] || curent_sim != sp){
                result += transl[text[i]];
                curent_sim = transl[text[i]];
            }
        } else {
            result += text[i];
            curent_sim = text[i];
        }
    }
    result = result.replace(/^_/, '').replace(/_$/, ''); // trim
    return result
};
function urltranslit() {
    var url = $("#createMenu").val();
    url = $.trim(url);
    var res = translit(url);
    $("#url").val(res);
}

</script>
