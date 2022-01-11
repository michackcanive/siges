<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin|SIGES</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/owl.transitions.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/morris<?= base_url()?>/assets/js/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/sweetalert2.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url()?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"> <!--<img class="main-logo" src="img/logo/logo.png" alt="" />--></a>
                <!--<strong><img src="img/logo/logosn.png" alt="" /></strong>-->
            </div>
			<div class="nalika-profile">
				<div class="profile-dtl">
					<a href="<?=base_url('/inicio')?>"><img src="<?= base_url()?>/assets/img/logo/user.png" alt="" /></a>
                    <?php 
                    $resultado_nome=explode(' ',$_SESSION['nome']??'Offline ');
                    ?>
					<h2><?=$resultado_nome[0]??''?><span class="min-dtn"></span></h2>
				</div>
				
			</div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    <li >
                            <a class="has-arrow" href="<?=base_url('/inicio')?>">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Dashboard</span>
								</a>
                            
                        </li>
                    <li >
                            <a class="has-arrow" href="<?=base_url('/inicio')?>">
								   <i class="icon nalika-user author-log-ic"></i>
								   <span class="mini-click-non"><?=$_SESSION['tipo_de_conta_init']??''?></span>
								</a>
                          
                        </li>
                        <li >
                            <a class="has-arrow" href="#">
								   <i class=" icon nalika-alarm  "></i>
								   <span class="mini-click-non">Pedidos</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="listar_pago v.1" href=" <?=base_url('operacaosl/listar_reservas_no_pagas')?>"><span class="mini-sub-pro">Pedidos/Pendentes</span></a></li>
                                <li><a title="listar_no_pagos v.2" href="<?=base_url('operacaosl/listar_reservas_pagas')?>"><span class="mini-sub-pro">Pedidos/Pagos</span></a></li>
                               
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-bar-chart icon-wrap"></i> <span class="mini-click-non">Operações</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="<?=base_url('operacaosl/cadastrar_sl')?>"><span class="mini-sub-pro">Cadastrar Salão</span></a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Serviços</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="<?=base_url('operacaosl/cadastrar_servicos')?>"><span class="mini-sub-pro">Cadastar/serviços</span></a></li>
                                <li><a title="Data Maps" href="<?=base_url('operacaosl/gestao_servicos')?>"><span class="mini-sub-pro">Gestão de Serviços</span></a></li>
                            </ul>
                        </li>
                        
                        
                        
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="icon nalika-menu-task"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form role="search" class="">
													<input type="text" placeholder="Pesquisar Salão..." class="form-control">
													<a href=""><i class="fa fa-search"></i></a>
												</form>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="icon nalika-mail" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                       
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="<?= base_url()?>/assets/img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    
                                                                </a>
                                                            </li>
                                                          
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">Ver mais</a>
                                                        </div>
                                                    </div>
                                                </li>
                                              
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-user" aria-hidden="true"></i>
															<span class="admin-name">Mais</span>
															<i class="icon nalika-down-arrow nalika-angle-dw"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        
                                                        <li><a href="#"><span class="icon nalika-user author-log-ic"></span>Inicio</a>
                                                        </li>
                                                        <li><a href="lock.html"><span class="icon nalika-diamond author-log-ic"></span>Meus Saloes</a>
                                                        </li>
                                                        <li><a href="#"><span class="icon nalika-settings author-log-ic"></span>Serviços</a>
                                                        </li>
                                                        <li><a href="<?=base_url('sair')?>"><span class="icon nalika-unlocked author-log-ic"></span>Sair</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="icon nalika-menu-task"></i></a>

                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                       

                                                     
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                    <li class="active">
                            <a class="has-arrow" href="index.html">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Pedidos</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="index.html"><span class="mini-sub-pro">Pedidos/Enviados</span></a></li>
                                <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Pedidos/Enviados</span></a></li>
                               
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Operações</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="mailbox.html"><span class="mini-sub-pro">Cadastrar Salão</span></a></li>
                                <li><a title="Compose Mail" href="mailbox-compose.html"><span class="mini-sub-pro">Gestão de Salão</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Serviços</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="google-map.html"><span class="mini-sub-pro">Cadastar/serviços</span></a></li>
                                <li><a title="Data Maps" href="data-maps.html"><span class="mini-sub-pro">Gestão de Serviços</span></a></li>
                            </ul>
                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2><?=$_SESSION['nome']??'Offline'?></h2>
												<p>Ben vindo(a) <?php echo $_SESSION['tipo_de_conta_init']  ?> <span class="bread-ntd">| SIGES</span></p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                    <div class="section-admin container-fluid">
                                        <?php 
                                       
                                        
                                       if(!empty($_SESSION['tipo_de_conta_init'])){
                                           if($_SESSION['tipo_de_conta_init']=='Admin'){ ?>

                                   
                                       <br><br><br><br> 

            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>Meus Salões </b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <label class="label bg-green">Total: 30% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                    
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 78%;" class="progress-bar bg-green"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Serviços</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-red">Total: <?=$_SESSION['total_servicos']??''?> <i class="fa fa-level-down" aria-hidden="true"></i></label>
                                    </div>
                                   
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Reservas Pendentes</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-blue">Total: 39% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                    
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Saldo da Conta</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-purple">800Kz <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                   
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-purple"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <?php
      }
    }?>
        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!--/////////////////////////////////////////////////////////////////////////////-->

        <div class="product-cart-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-cart-inner">
                            <div id="example">