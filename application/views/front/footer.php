<?php if($this->myfunctions->checkSiteState()): $this->myfunctions->getMessageOffSite();?>
<?php else:?>
<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php  echo base_url('assets/front/js/jquery.js');?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php  echo base_url('assets/front/js/bootstrap.min.js');?>"></script>

</body>

</html>
<?php endif?>