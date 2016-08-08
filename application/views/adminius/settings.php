<div class="col-md-10">
    <div class="panel with-nav-tabs panel-primary">
        <div class="panel-heading clearfix">
            <div>
                <ul class="nav nav-tabs">
                    <li class="active expand text-center"><a href="#tab1primary" data-toggle="tab">Site Settings</a></li>
                    <li class="expand text-center"><a href="#tab2primary" data-toggle="tab">MetaData</a></li>
                    <li class="expand text-center"><a href="#tab3primary" data-toggle="tab">Server</a></li>
                    <li class="expand"><a href="" data-toggle="tab"></a></li>
                    <li class="expand"><a href="" data-toggle="tab"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1primary">
                    <div class="row">
                        <?php  $settings = ($this->myfunctions->getSiteSettings()); echo form_open('adminius/settings/site', array("class" => "from-horizontal")); ?>
                        <div class="col-md-4">
                            <?php  echo validation_errors(); ?>
                            <?php  echo $this->session->flashdata('msg'); ?>
                            <fieldset class="form-group">
                                <input id="toggle-event" type="checkbox" data-toggle="toggle" data-on="включен"
                                       data-off="выключен"
                                       value="1"
                                       name="sitestate"><span id="console-event"> Сайт включен</span>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="sitename">Название сайта</label>
                                <input type="text" name="sitename" class="form-control" id="sitename"
                                       value="<?php isset($settings) ?  set_value(print $settings['settings']['site_name']): false;?>"
                                       placeholder="Site Name">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="mess">Сообщение при выключенном сайте</label>
                                <textarea id="message" name="message" class="form-control" id="message"
                                          placeholder="Сообщение при выключенном сайте"><?php  isset($settings) ? set_value(print $settings['settings']['message']) : false; ?></textarea>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" name="saveSiteSettings" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="tab2primary">
                    <div class="row">
                        <?php  echo form_open('adminius/settings/seo', array("class" => "from-horizontal")); ?>
                        <div class="col-md-4">
                            <?php  echo validation_errors(); ?>
                            <?php  echo $this->session->flashdata('msgSeo'); ?>
                            <fieldset class="form-group">
                                <label for="sitedescription">Мета-тег Description для сайта</label>
                                <textarea id="sitedescription" name="sitedescription" class="form-control"
                                           placeholder="Мета-тег Description для сайта"><?php  isset($settings) ? set_value(print $settings['settings']['description']) : false; ?></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="sitekeywords">Мета-тег Keywords</label>
                                <textarea id="sitekeywords" name="sitekeywords" class="form-control"
                                          placeholder="Мета-тег Keywords"><?php  isset($settings) ? set_value(print $settings['settings']['keywords']) : false; ?></textarea>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="copyright">Авторские права</label>
                                <textarea id="copyright" name="copyright" class="form-control"
                                          placeholder="Авторские права"><?php  isset($settings) ? set_value(print $settings['settings']['copyright']) : false; ?></textarea>
                            </fieldset>
                            <div class="form-group">
                                <label for="robots">Мета-тег Robots</label>
                                <select name="robots" id="robots" class="form-control">
                                    <?php 
                                    for ($i = 1; $i <= 4; $i++) {
                                        if ($i == $settings['settings']['robots']) {
                                            echo '<option selected="selected" value="' . $i . '">' . $this->myfunctions->getRobotsVal($i);
                                        } else {
                                            echo '<option value="' . $i . '">' . $this->myfunctions->getRobotsVal($i);
                                        }
                                    };
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" name="saveSeo" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="tab-pane fade in active" id="tab3primary">
                    <div class="row">
                    </div>
                    <div class="row">
                    </div>
                </div>
        </div>
    </div>
</div>
</div>

</div><!--row headerius-->
</div><!--container headerius-->
</div><!--section headerius-->
<script>
    $(document).ready(function () {
        var state = '<?php isset($settings) && $settings['settings']['site_state'] == 1 ? print 1 :  print 0 ?>';
        if(state == 1) {
            $('#toggle-event').bootstrapToggle('on');
        }
    });

    $(function() {
        $('#toggle-event').change(function() {
            if($(this).prop('checked')){
                var state = 'включен';
            }else{
                state = 'выключен';
            }
            $('#console-event').html(' Сайт: ' + state)
        })
    })
</script>