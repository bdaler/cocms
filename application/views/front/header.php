<?php  if ($this->myfunctions->checkSiteState()): echo $this->myfunctions->getMessageOffSite(); ?>
<?php  else: ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php  $settings = ($this->myfunctions->getSiteSettings()); ?>
    <title><?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->title) : print_r($settings['settings']['site_name']); ?></title>

    <meta name="robots"
          content="<?php  isset($settings) && !empty($settings) ? print_r($this->myfunctions->getRobotsVal($settings['settings']['robots'])) : false ?>">
    <meta name="description"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->description) : print_r($settings['settings']['description']) ?>"/>
    <meta name="keywords"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->keywords) : print_r($settings['settings']['keywords']) ?>"/>
    <meta name="author"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->author) : print_r($settings['settings']['copyright']) ?>"/>


    <!-- Facebook and Twitter integration -->
    <meta property="og:title"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->title) : print_r($settings['settings']['site_name']); ?>"/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content="<?php  echo urldecode(current_url()); ?>"/>
    <meta property="og:site_name"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->title) : print_r($settings['settings']['site_name']); ?>"/>
    <meta property="og:description"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->description) : print_r($settings['settings']['description']) ?>"/>
    <meta name="twitter:title"
          content="<?php  isset($articl) && !empty($articl) ? print_r($articl['onecontent']->title) : print_r($settings['settings']['site_name']); ?>"/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content="<?php echo urldecode(current_url()); ?>"/>
    <meta name="twitter:card" content="summary"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="<?php  echo base_url('assets/front/css/bootstrap.min.css'); ?>"
          rel="stylesheet" type="text/css">
    <link href="<?php  //echo base_url('assets/front/css/blog-home.css');?>"
          rel="stylesheet" type="text/css">
</head>
<body>
<!-- Navigation -->
<div class="navbar navbar-default navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php  echo base_url(); ?>"
               class="navbar-brand"><span><?php  print_r($settings['settings']['site_name']) ?></span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="<?php  echo base_url('adminius/main/'); ?>"><i class="fa fa-fw fa-home"></i>Login</a>
                </li>
            </ul>
            <?php  isset($menu) ? $this->myfunctions->generateMenu($menu) : false; ?>
        </div>
    </div>
</div>
<?php  endif ?>
