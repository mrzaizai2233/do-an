<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\Giaodien1;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

Giaodien1::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>
<body class="sidebar-colors">
<?php $this->beginBody() ?>
<div><!--BEGIN THEME SETTING-->
    <!--END THEME SETTING--><!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP--><!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3"
             data-intro="&lt;b&gt;Topbar&lt;/b&gt; has other styles with live demo. Go to &lt;b&gt;Layouts-&gt;Header&amp;Topbar&lt;/b&gt; and check it out."
             class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="<?=Yii::$app->urlManager->createUrl(['site'])?>" class="navbar-brand"><span class="fa fa-rocket"></span><span
                        class="logo-text">µAdmin</span><span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar-nav    ">
                    <li class="active"><a href="<?=Yii::$app->urlManager->createUrl(['site'])?>">Dashboard</a></li>
                    <li><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">Layouts
                            &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="layout-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="layout-right-sidebar.html">Right Sidebar</a></li>
                            <li><a href="layout-left-sidebar-collasped.html">Left Sidebar Collasped</a></li>
                            <li><a href="layout-right-sidebar-collasped.html">Right Sidebar Collasped</a></li>
                            <li class="dropdown-submenu"><a href="javascript:;" data-toggle="dropdown"
                                                            class="dropdown-toggle">More Options</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Second level link</a></li>
                                    <li class="dropdown-submenu"><a href="javascript:;" data-toggle="dropdown"
                                                                    class="dropdown-toggle">More Options</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Second level link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu-dropdown"><a href="javascript:;" data-toggle="dropdown"
                                                      class="dropdown-toggle">UI Elements
                            &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                    elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde
                                                    omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et
                                                    iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                    soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                    facilis est</a></li>
                                        </ul>
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                    elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde
                                                    omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et
                                                    iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                    soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                    facilis est</a></li>
                                        </ul>
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                    elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde
                                                    omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et
                                                    iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                    soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                    facilis est</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu-dropdown mega-menu-full"><a href="javascript:;" data-toggle="dropdown"
                                                                     class="dropdown-toggle">Extras
                            &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit
                                                        amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                        elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis
                                                        unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et
                                                        accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                        soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                        facilis est</a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit
                                                        amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                        elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis
                                                        unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et
                                                        accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                        soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                        facilis est</a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit
                                                        amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                        elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis
                                                        unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et
                                                        accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                        soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                        facilis est</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5 document-demo">
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i
                                                            class="fa fa-info-circle"></i><span>Introduction</span></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-download"></i><span>Installation</span></a>
                                                </li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i class="fa fa-cog"></i><span>T3 Settings</span></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-desktop"></i><span>Layout System</span></a>
                                                </li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i
                                                            class="fa fa-magic"></i><span>Customization</span></a></li>
                                                <li><a href="#"><i
                                                            class="fa fa-question-circle"></i><span>FAQs</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right"><a href="#"><i class="fa fa-search"></i></a><input type="text"
                                                                                                     placeholder="Search here..."
                                                                                                     class="form-control"/>
                    </div>
                </form>
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left">News:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li>Welcome to μAdmin - Responsive Multi-Style Admin Template</li>
                        <li>Trang web bán hàng thương mại điện tử.</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i
                                class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><p>You have 14 new notifications</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="#"><span class="label label-blue"><i
                                                        class="fa fa-comment"></i></span>New Comment<span
                                                    class="pull-right text-muted small">4 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-violet"><i
                                                        class="fa fa-twitter"></i></span>3 New Followers<span
                                                    class="pull-right text-muted small">12 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-pink"><i
                                                        class="fa fa-envelope"></i></span>Message Sent<span
                                                    class="pull-right text-muted small">15 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-green"><i
                                                        class="fa fa-tasks"></i></span>New Task<span
                                                    class="pull-right text-muted small">18 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-yellow"><i
                                                        class="fa fa-upload"></i></span>Server Rebooted<span
                                                    class="pull-right text-muted small">19 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-green"><i
                                                        class="fa fa-tasks"></i></span>New Task<span
                                                    class="pull-right text-muted small">2 days ago</span></a></li>
                                        <li><a href="#"><span class="label label-pink"><i
                                                        class="fa fa-envelope"></i></span>Message Sent<span
                                                    class="pull-right text-muted small">5 days ago</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="#" class="text-right">See all alerts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i
                                class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li><p>You have 14 new messages</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="#"><span class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg"
                                                        alt="" class="img-responsive img-circle"/></span><span
                                                    class="info"><span class="name">Jessica Spencer</span><span
                                                        class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                        <li><a href="#"><span class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg"
                                                        alt="" class="img-responsive img-circle"/></span><span
                                                    class="info"><span class="name">John Smith<span
                                                            class="label label-blue pull-right">New</span></span><span
                                                        class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                        <li><a href="#"><span class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg"
                                                        alt="" class="img-responsive img-circle"/></span><span
                                                    class="info"><span class="name"><?php if(isset(Yii::$app->user->identity->username)) echo Yii::$app->user->identity->username; else echo ""?><span
                                                            class="label label-orange pull-right">10 min</span></span><span
                                                        class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                        <li><a href="#"><span class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg"
                                                        alt="" class="img-responsive img-circle"/></span><span
                                                    class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                        <li><a href="#"><span class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg"
                                                        alt="" class="img-responsive img-circle"/></span><span
                                                    class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="#">Read all messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i
                                class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <li><p>You have 14 pending tasks</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="#"><span class="task-item">Fix the HTML code<small
                                                        class="pull-right text-muted">40%
                                                    </small></span>

                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 40%;"
                                                         class="progress-bar progress-bar-orange"><span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a href="#"><span class="task-item">Make a wordpress theme<small
                                                        class="pull-right text-muted">60%
                                                    </small></span>

                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 60%;"
                                                         class="progress-bar progress-bar-blue"><span class="sr-only">60% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a href="#"><span class="task-item">Convert PSD to HTML<small
                                                        class="pull-right text-muted">55%
                                                    </small></span>

                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 55%;"
                                                         class="progress-bar progress-bar-green"><span class="sr-only">55% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a href="#"><span class="task-item">Convert HTML to Wordpress<small
                                                        class="pull-right text-muted">78%
                                                    </small></span>

                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="78" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 78%;"
                                                         class="progress-bar progress-bar-yellow"><span class="sr-only">78% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="#">See all tasks</a></li>
                        </ul>
                    </li>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt=""
                                class="img-responsive img-circle"/>&nbsp;<span
                                class="hidden-xs"><?php if(isset(Yii::$app->user->identity->username)) echo Yii::$app->user->identity->username; else echo ""?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="extra-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="page-calendar.html"><i class="fa fa-calendar"></i>My Calendar</a></li>
                            <li><a href="email-inbox.html"><i class="fa fa-envelope"></i>My Inbox<span
                                        class="badge badge-danger">3</span></a></li>
                            <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span
                                        class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="extra-lock-screen.html"><i class="fa fa-lock"></i>Lock Screen</a></li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/logout'])?>"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                    <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4"
                                                              data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker"
                                                              data-position="left" class="btn-chat"><i
                                class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>
                </ul>
            </div>
        </nav>
        <!--BEGIN MODAL CONFIG PORTLET-->
        <div id="modal-config" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 class="modal-title">Modal title</h4></div>
                    <div class="modal-body"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et
                            nisl eget porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie.
                            Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis magna et
                            aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor vitae quam dictum
                            condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec aliquam nisi, a mollis neque.
                            Ut vel felis quis tellus hendrerit placerat. Vivamus vel nisl non magna feugiat dignissim
                            sed ut nibh. Nulla elementum, est a pretium hendrerit, arcu risus luctus augue, mattis
                            aliquet orci ligula eget massa. Sed ut ultricies felis.</p></div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL CONFIG PORTLET--></div>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" data-step="2"
             data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right"
             class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                        <div class="thumb"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg"
                                                alt="" class="img-circle"/></div>
                        <div class="info"><p><?php if(isset(Yii::$app->user->identity->username)) echo Yii::$app->user->identity->username; else echo ""?></p>
                            <ul class="list-inline list-unstyled">
                                <li><a href="extra-profile.html" data-hover="tooltip" title="Profile"><i
                                            class="fa fa-user"></i></a></li>
                                <li><a href="email-inbox.html" data-hover="tooltip" title="Mail"><i
                                            class="fa fa-envelope"></i></a></li>
                                <li><a href="#" data-hover="tooltip" title="Setting" data-toggle="modal"
                                       data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
                                <li><a href="<?=Yii::$app->urlManager->createUrl(['site/logout'])?>" data-hover="tooltip" title="Logout"><i
                                            class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="active"><a href="<?=Yii::$app->urlManager->createUrl(['site'])?>"><i class="fa fa-tachometer fa-fw">
                                <div class="icon-bg bg-orange"></div>
                            </i><span class="menu-title">Dashboard</span></a></li>
                    <li><a href="#"><i class="fa fa-desktop fa-fw">
                                <div class="icon-bg bg-pink"></div>
                            </i><span class="menu-title">Quản Lý</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['hang-hoa'])?>"><i class="fa fa-align-left"></i><span
                                        class="submenu-title">Hàng Hóa</span></a></li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['loai-hang'])?>"><i
                                        class="fa fa-angle-double-left"></i><span class="submenu-title">Loại Hàng</span></a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['nha-cung-cap'])?>"><i class="fa fa-align-right"></i><span
                                        class="submenu-title">Nhà Cung Cấp</span></a></li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['thuong-hieu'])?>"><i
                                        class="fa fa-angle-double-right"></i><span class="submenu-title">Thương Hiệu</span></a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['user'])?>"><i class="fa fa-header"></i><span
                                        class="submenu-title">Thành viên</span></a></li>
                            <li><a href="layout-horizontal-menu-sidebar.html"><i class="fa fa-h-square"></i><span
                                        class="submenu-title">Horizontal Menu & Sidebar</span></a></li>
                            <li><a href="layout-fixed-topbar.html"><i class="fa fa-magnet"></i><span
                                        class="submenu-title">Fixed Topbar</span></a></li>
                            <li><a href="layout-boxed.html"><i class="fa fa-columns"></i><span class="submenu-title">Boxed Layout</span></a>
                            </li>
                            <li><a href="layout-hidden-footer.html"><i class="fa fa-eye-slash"></i><span
                                        class="submenu-title">Hidden Footer</span></a></li>
                            <li><a href="layout-header-topbar.html"><i class="fa fa-paperclip"></i><span
                                        class="submenu-title">Header & Topbar</span></a></li>
                            <li><a href="layout-title-breadcrumb.html"><i class="fa fa-link"></i><span
                                        class="submenu-title">Title & Breadcrumb</span></a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-th-list fa-fw">
                                <div class="icon-bg bg-blue"></div>
                            </i><span class="menu-title">Tables</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="table-basic.html"><i class="fa fa-th-large"></i><span class="submenu-title">Basic Tables</span></a>
                            </li>
                            <li><a href="table-responsive.html"><i class="fa fa-tablet"></i><span class="submenu-title">Responsive Tables</span></a>
                            </li>
                            <li><a href="table-action.html"><i class="fa fa-tencent-weibo"></i><span
                                        class="submenu-title">Action Tables</span></a></li>
                            <li><a href="table-filter.html"><i class="fa fa-filter"></i><span class="submenu-title">Filter Tables</span></a>
                            </li>
                            <li><a href="table-advanced.html"><i class="fa fa-indent"></i><span class="submenu-title">Advanced Tables</span></a>
                            </li>
                            <li><a href="table-sample.html"><i class="fa fa-table"></i><span class="submenu-title">Sample Tables</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-database fa-fw">
                                <div class="icon-bg bg-red"></div>
                            </i><span class="menu-title">Data Grids</span><span class="fa arrow"></span><span
                                class="label label-yellow">New</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#"><i class="fa fa-th-large"></i><span
                                        class="submenu-title">Layout Examples</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="grid-layout-div.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">DIVs Layout</span></a></li>
                                    <li><a href="grid-layout-table-1.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Table Demo 1</span></a></li>
                                    <li><a href="grid-layout-table-2.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Table Demo 2</span></a></li>
                                    <li><a href="grid-layout-2-table.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">2 Tables on the Page</span></a></li>
                                    <li><a href="grid-layout-ul-li.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">UL LI</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-tencent-weibo"></i><span class="submenu-title">Actions Examples</span><span
                                        class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="grid-filter-with-ul-li.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Filters With UL/LI</span></a></li>
                                    <li><a href="grid-filter-with-select.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Filters With SELECT</span></a></li>
                                    <li><a href="grid-double-sort.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Double Sort</span></a></li>
                                    <li><a href="grid-deep-linking.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Deep Linking</span></a></li>
                                    <li><a href="grid-pagination-only.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Pagination Only</span></a></li>
                                    <li><a href="grid-without-item-per-page.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Without "Items per Page"</span></a></li>
                                    <li><a href="grid-hidden-sort.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Hidden Sort</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-table"></i><span
                                        class="submenu-title">jPList with jQuery UI</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="grid-range-slider.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Range Slider</span></a></li>
                                    <li><a href="grid-datepicker.html"><i class="fa fa-angle-right"></i><span
                                                class="submenu-title">Date Picker Filter</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU--><!--BEGIN CHAT FORM-->
        <div id="chat-form" class="fixed">
            <div class="chat-inner"><h2 class="chat-header"><a href="javascript:;" class="chat-form-close pull-right"><i
                            class="glyphicon glyphicon-remove"></i></a><i class="fa fa-user"></i>&nbsp;
                    Chat
                    &nbsp;<span class="badge badge-info">3</span></h2>

                <div id="group-1" class="chat-group"><strong>Favorites</strong><a href="#"><span
                            class="user-status is-online"></span>
                        <small>Verna Morton</small>
                        <span class="badge badge-info">2</span></a><a href="#"><span
                            class="user-status is-online"></span>
                        <small>Delores Blake</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-busy"></span>
                        <small>Nathaniel Morris</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-idle"></span>
                        <small>Boyd Bridges</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-offline"></span>
                        <small>Meredith Houston</small>
                        <span class="badge badge-info is-hidden">0</span></a></div>
                <div id="group-2" class="chat-group"><strong>Office</strong><a href="#"><span
                            class="user-status is-busy"></span>
                        <small>Ann Scott</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-offline"></span>
                        <small>Sherman Stokes</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-offline"></span>
                        <small>Florence Pierce</small>
                        <span class="badge badge-info">1</span></a></div>
                <div id="group-3" class="chat-group"><strong>Friends</strong><a href="#"><span
                            class="user-status is-online"></span>
                        <small>Willard Mckenzie</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-busy"></span>
                        <small>Jenny Frazier</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-offline"></span>
                        <small>Chris Stewart</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                            class="user-status is-offline"></span>
                        <small>Olivia Green</small>
                        <span class="badge badge-info is-hidden">0</span></a></div>
            </div>
            <div id="chat-box" style="top:400px">
                <div class="chat-box-header"><a href="#" class="chat-box-close pull-right"><i
                            class="glyphicon glyphicon-remove"></i></a><span class="user-status is-online"></span><span
                        class="display-name">Willard Mckenzie</span>
                    <small>Online</small>
                </div>
                <div class="chat-content">
                    <ul class="chat-box-body">
                        <li><p><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg"
                                    class="avt"/><span class="user"><?php if(isset(Yii::$app->user->identity->username)) echo Yii::$app->user->identity->username; else echo ""?></span><span class="time">09:33</span></p>

                            <p>Hi Swlabs, we have some comments for you.</p></li>
                        <li class="odd"><p><img src="https://s3.amazonaws.com/uifaces/faces/twitter/alagoon/48.jpg"
                                                class="avt"/><span class="user">Swlabs</span><span
                                    class="time">09:33</span></p>

                            <p>Hi, we're listening you...</p></li>
                    </ul>
                </div>
                <div class="chat-textarea"><input placeholder="Type your message" class="form-control"/></div>
            </div>
        </div>
        <!--END CHAT FORM--><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title"><?= $this->title?></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <!--END CONTENT-->
            <div id="print-range" class="hide">

            </div>
            <div class="page-content">
                <?= $content ?>
            </div>
            <!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright">2014 © &mu;Admin - Responsive Multi-Style Admin Template</div>
            </div>
            <!--END FOOTER--></div>
        <!--END PAGE WRAPPER--></div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

