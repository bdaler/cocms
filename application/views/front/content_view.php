<?php if ($this->myfunctions->checkSiteState()): $this->myfunctions->getMessageOffSite(); ?>
<?php else: ?>
    <!-- Page Content -->
    <!--для одиночного показа контетна-->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <h2><?php isset($articl) && !empty($articl) ? print_r($articl['onecontent']->title) : false ?></h2>
            <p><?php isset($articl) && !empty($articl) ? print_r($articl['onecontent']->text) : print_r('content not found') ?></p>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="<?php  echo base_url('') ?>">&larr; Back</a>
                </li>

            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <?php isset($categorai) ? $this->myfunctions->generateCategoria($categorai) : false ?>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
                    laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

<?php  endif ?>