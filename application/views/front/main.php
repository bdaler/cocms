<?php  if($this->myfunctions->checkSiteState()): $this->myfunctions->getMessageOffSite();?>
<?php  else:?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <?php  isset($content) ? $this->myfunctions->getContent($content) : false ?>
            <?php  isset($cfm) ? $this->myfunctions->getContent($cfm) : false//print_r('content not found') ?>
            <?php  isset($item) ? $this->myfunctions->getContent($item) : false//print_r('content not found') ?>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <?php isset($links)?print_r($links):false;?>
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
                    <?php  isset($categorai) ? $this->myfunctions->generateCategoria($categorai) : false ?>
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

<?php endif?>