<?php echo form_open('adminius/main/editor'); ?>
<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Content Editor</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-9">
                <div class="row">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="col-lg-6">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <label>Title</label>
                              </span>
                            <input type="text" class="form-control"
                                   value="<?php (isset($content)) ? set_value(print $content['contentById']->title) : set_value(''); ?>"
                                   name="title"
                                   id="title" onchange="titletranslit()">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <label>Url</label>
                              </span>
                            <input type="text" class="form-control"
                                   value="<?php (isset($content)) ? set_value(print $content['contentById']->url) : set_value(''); ?>"
                                   name="url" id="url" readonly>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row --><p></p>
                <textarea name="ckeditor_full"
                          id="ckeditor_full"> <?php (isset($content)) ? set_value(print $content['contentById']->text) : set_value(''); ?> </textarea>
            </div>
            <div class="col-md-3">
                <?php  if (isset($content)): //если пришли из списка контентов для редактирования конкретного записа  ?>
                <p class="text-center">Options</p>
                <?php  echo validation_errors(); ?>
                <form role="form">
                    <fieldset>
                        <div class="form-group">
                            <label for="menuid">Menu_id</label>
                            <select name="menuid" id="menuid" class="form-control">
                                <?php  if (isset($menu)) {
                                    //print_r($content);
                                    foreach ($menu as $value) {
                                        if ($content['contentById']->menu_id == $value['id']) {
                                            echo '<option selected="selected" value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        } else {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        };
                                    };
                                }; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaid">Categoria_id</label>
                            <select name="categoriaid" id="categoriaid" class="form-control">
                                <?php  if (isset($categoria)) {
                                    foreach ($categoria as $value) {
                                        if ($content['contentById']->categoria_id == $value['id']) {
                                            echo '<option selected="selected" value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        } else {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        };
                                    };
                                }; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <select name="state" id="state" class="form-control">
                                <?php 
                                for ($i = 1; $i <= 3; $i++) {
                                    if ($i == $content['contentById']->status) {
                                        echo '<option selected="selected" value="' . $i . '">' . $this->myfunctions->getStateName($i);
                                    } else {
                                        echo '<option value="' . $i . '">' . $this->myfunctions->getStateName($i);
                                    }
                                };
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <input type="text" name="keywords" id="keywords" class="form-control"
                                   placeholder="Enter keywords of this content"
                                   value="<?php  isset($content) ? set_value(print $content['contentById']->keywords): set_value('');?>">
                        </div>
                        <div class="form-group">
                            <label for="descr">Description</label>
                            <textarea name="descr" id="descr" class="form-control"
                                      placeholder="Enter description of this content"><?php  isset($content) ? set_value(print $content['contentById']->description) : set_value(''); ?></textarea>
                        </div>
                        <?php if (isset($content)) {
                            echo form_hidden('update', print_r($content['contentById']->id, true));
                        } ?>
                        <button name="save_btn" type="submit" class="btn btn-primary">Сохранить</button>
                        <a href="<?php  echo base_url('adminius/main/contentlist'); ?>" onclick="check_text()"
                           name="close_btn" class="btn btn-primary">Закрыть</a>
                        <?php  else: //страница для создание контекста?>
                            <div class="form-group">
                                <label for="menuid">Menu_id</label>
                                <select name="menuid" id="menuid" class="form-control">
                                    <?php  if (isset($menu)) {
                                        foreach ($menu as $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        }
                                    }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoriaid">Categoria_id</label>
                                <select name="categoriaid" id="categoriaid" class="form-control">
                                    <?php  if (isset($categoria)) {
                                        foreach ($categoria as $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                        }
                                    }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-control">
                                    <?php 
                                    for ($i = 1; $i <= 3; $i++) {
                                        echo '<option value="' . $i . '">' . $this->myfunctions->getStateName($i);
                                    };
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" name="keywords" id="keywords" class="form-control"
                                       placeholder="Enter keywords of this content">
                            </div>
                            <div class="form-group">
                                <label for="descr">Description</label>
                                <textarea name="descr" id="descr" class="form-control"
                                          placeholder="Enter description of this content"></textarea>
                            </div>
                            <?php if (isset($content)) {
                                echo form_hidden('update', print_r($content['contentById']->id, true));
                            } ?>
                            <button name="save_btn" type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="<?php  echo base_url('adminius/main/contentlist'); ?>" onclick="check_text()"
                               name="close_btn" class="btn btn-primary">Закрыть</a>
                        <?php  endif; ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div><!--row headerius-->
</div><!--container headerius-->
</div><!--section headerius-->
<script src="<?php  echo base_url('assets/adminius/vendors/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php  echo base_url('assets/adminius/vendors/ckeditor/adapters/jquery.js'); ?>"></script>
<script src="<?php  echo base_url('assets/adminius/assets/scripts.js'); ?>"></script>
<script>
    $(function () {
        $('textarea#ckeditor_full').ckeditor({width: '100%', height: '250px'});
    });
    function check_text() {
        var data = $('#ckeditor_full').val();
        if (data.length > 0) {
            return confirm('Are you sure?');
        }
    }
    ;
    function translit(str) {
        var sp = '-';
        var text = str.toLowerCase();
        var transl = {
            '\u0430': 'a',
            '\u0431': 'b',
            '\u0432': 'v',
            '\u0433': 'g',
            '\u0434': 'd',
            '\u0435': 'e',
            '\u0451': 'e',
            '\u0436': 'zh',
            '\u0437': 'z',
            '\u0438': 'i',
            '\u0439': 'j',
            '\u043a': 'k',
            '\u043b': 'l',
            '\u043c': 'm',
            '\u043d': 'n',
            '\u043e': 'o',
            '\u043f': 'p',
            '\u0440': 'r',
            '\u0441': 's',
            '\u0442': 't',
            '\u0443': 'u',
            '\u0444': 'f',
            '\u0445': 'h',
            '\u0446': 'c',
            '\u0447': 'ch',
            '\u0448': 'sh',
            '\u0449': 'shch',
            '\u044a': '\'',
            '\u044b': 'y',
            '\u044c': '',
            '\u044d': 'e',
            '\u044e': 'yu',
            '\u044f': 'ya',
            '\u00AB': '_',
            '\u00BB': '_', // «»
            ' ': sp,
            '_': sp,
            '`': sp,
            '~': sp,
            '!': sp,
            '@': sp,
            '#': sp,
            '$': sp,
            '%': sp,
            '^': sp,
            '&': sp,
            '*': sp,
            '(': sp,
            ')': sp,
            '-': sp,
            '\=': sp,
            '+': sp,
            '[': sp,
            ']': sp,
            '\\': sp,
            '|': sp,
            '/': sp,
            '.': sp,
            ',': sp,
            '{': sp,
            '}': sp,
            '\'': sp,
            '"': sp,
            ';': sp,
            ':': sp,
            '?': sp,
            '<': sp,
            '>': sp,
            '№': sp
        }
        var result = '';
        var curent_sim = '';
        for (i = 0; i < text.length; i++) {
            if (transl[text[i]] != undefined) {
                if (curent_sim != transl[text[i]] || curent_sim != sp) {
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
    }
    ;
    function titletranslit() {
        var url = $("#title").val();
        url = $.trim(url);
        var res = translit(url);
        $("#url").val(res);
    }

</script>
