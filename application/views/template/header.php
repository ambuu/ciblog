<!DOCTYPE html>
<html>
<head>
    <title>CiBLOG</title>
    <!-- <link rel="stylesheet" href="assets/css/darky.css"> -->
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
</head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
            <div class="container">
                <a href="<?php echo base_url(); ?>" class="navbar-brand">CiBloG</a>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>" class="nav-link"><i class="fa fa-lg fa-home"></i>Home</a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>about" class="nav-link"><i class="fa fa-lg fa-info-circle"></i>About</a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>posts" class="nav-link"><i class="fa fa-lg fa-newspaper-o"></i>Blog</a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>categories" class="nav-link"><i class="fa fa-lg fa-list"></i>Categories</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!$this->session->userdata('logged_in')) :?>
                        <li class="nav-item"><a href="<?php echo base_url() ?>users/register" class="nav-link"><i class="fa fa-lg fa-user-plus"></i>Register</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>users/login" class="nav-link"><i class="fa fa-lg fa-sign-in"></i>Login</a></li>
                    <?php endif;?>
                    <?php if ($this->session->userdata('logged_in')) :?>
                        <li class="nav-item"><a href="<?php echo base_url() ?>posts/create" class="nav-link"><i class="fa fa-lg fa-address-card"></i>Create Post</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>categories/create" class="nav-link"><i class="fa fa-lg fa-th-list"></i>Create Category</a></li>
                        <li class="nav-item"><a href="<?php echo base_url() ?>users/logout" class="nav-link"><i class="fa fa-1x fa-sign-out"></i>Log out</a></li>
                    <?php endif;?>
                </ul>          
            </div>
        </nav>
    <div class="container">
    <!-- Flash message -->
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post-deleted')): ?>
        <?php echo '<p class="alert alert-dismissible alert-danger">'.$this->session->flashdata('post-deleted').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-dismissible alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-dismissible alert-secondary">'.$this->session->flashdata('user_loggedin').'</p>';?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-dismissible alert-info">'.$this->session->flashdata('user_loggedout').'</p>';?>
    <?php endif; ?>
    
