<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Content List</h3>
        </div>
        <div class="panel-body">
            <?php  if (isset($Content)): ?>
                <table id="contentListTable" class="table  table-hover">
                    <?php  foreach ($Content as $content): ?>
                        <tbody>
                        <tr>
                            <td><?php  echo '<a href="' . base_url('adminius/main/editor/' . $content->getCid()) . '">' . $content->getCid() . '</a>'; ?></td>
<!--                                <div class="btn-group">-->
<!--                                    <a href="" class="btn btn-danger btn-md" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>-->
<!---->
<!--                                    <div class="btn-group">-->
<!--                                        <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown">-->
<!--                                            <span class="glyphicon glyphicon-chevron-down"></span>-->
<!--                                        </button>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Архивировать</a></li>-->
<!--                                            <li><a href="#"><span class="glyphicon glyphicon-trash"></span> В корзину</a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
                            <td><?php echo '<a href="' . base_url('adminius/main/editor/' . $content->getCid()) . '">' . $content->getCtitle() . '</a>'; ?></td>
                            <td><?php  echo '<a href="' . base_url('adminius/main/editor/' . $content->getCid()) . '">' . $content->getCurl() . '</a>'; ?></td>
                            <td><?php  echo $this->myfunctions->getStateName($content->getCstatus()); ?>
                            <td><?php  echo $this->myfunctions->getMenuNameById($content->getCmenuid()); ?></td>
                            <td><?php  echo $this->myfunctions->getCategoriaNameById($content->getCcategotyid()); ?></td>
                            <td><?php  echo $content->getCauthor(); ?></td>
                            <td><?php  echo $content->getCaddeddate(); ?></td>
                        </tr>
                        </tbody>
                    <?php  endforeach; ?>
                    <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Url</th>
                        <th class="text-center">State</th>
                        <th class="text-center">Menu_id</th>
                        <th class="text-center">Catigory_id</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Added_date</th>
                    </tr>
                    </thead>
                </table>
                <?php echo $links;?>
            <?php  endif; ?>
        </div>
    </div>
</div>
</div><!--row headerius-->
</div><!--container headerius-->
</div><!--section headerius-->
