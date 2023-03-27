<?php

use App\Models\Notify;
use App\Models\User;

$tn = new Notify();
$user = new User(); 

$notf = $tn->where(['userId' => session('id')])->orderBy('id', 'desc')->findAll();
$mush = $tn->where(['mushrif' => session('id')])->orderBy('id', 'desc')->findAll();
?>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url() ?>"><img class="brand-logo" alt="logo" src="<?= base_url('app-assets/images/logo/logo.png') ?>">
                            <h3 class="brand-text"><?= APP_NAME ?></h3>
                        </a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-link-expand" href="#">
                                <i class="ficon ft-maximize"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <?php if (count($notf) > 0) : ?>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon ft-bell"></i>
                                <span class="badge badge-pill badge-danger badge-up badge-glow"><?= count($notf) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2"><b><?= lang('app.notifications') ?></b></span>
                                    </h6>
                                    <span class="notification-tag badge badge-danger float-right m-0"><?= count($notf) ?></span>
                                </li>
                                <li class="scrollable-container media-list w-100 ps">
                                <?php foreach ($notf as $key => $dt) : ?>
                                    <span>
                                        <div class="media">
                                            <div class="media-left align-self-center">
                                                <?php if ($dt['info'] == 'danger') : ?>
                                                    <i class="ft-alert-octagon icon-bg-circle bg-danger bg-darken-3 mr-0"></i>
                                                <?php elseif ($dt['info'] == 'info') : ?>
                                                    <i class="ft-alert-circle icon-bg-circle bg-info mr-0"></i>
                                                <?php elseif ($dt['info'] == 'success') : ?>
                                                    <i class="ft-check-circle icon-bg-circle bg-success mr-0"></i>
                                                <?php elseif ($dt['info'] == 'warning') : ?>
                                                    <i class="ft-alert-triangle icon-bg-circle bg-warning bg-darken-3 mr-0"></i>
                                                    <?php endif ?>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading <?= $dt['info'] ?> darken-3">
                                                    <?= lang('app.notification') ?>: <b><?= lang('app.'. $dt['title']) ?></b>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted"><b><?= $dt['description'] ?></b></p>
                                                <small>
                                                    <span class="media-meta text-muted"><?= date("d/m/Y H:m:s", strtotime($dt['created_at'])) ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </span>
                                    <?php endforeach ?>
                                </li>
                            </ul>
                        </li>
                        <?php elseif (count($mush) > 0) : ?>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon ft-bell"></i>
                                <span class="badge badge-pill badge-danger badge-up badge-glow"><?= count($mush) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2"><b><?= lang('app.notifications') ?></b></span>
                                    </h6>
                                    <span class="notification-tag badge badge-danger float-right m-0"><?= count($mush) ?></span>
                                </li>
                                <li class="scrollable-container media-list w-100 ps">
                                <?php foreach ($mush as $key => $dt) : ?>
                                    <?php $user = new User(); ?>
                                    <span>
                                        <div class="media">
                                            <div class="media-left align-self-center">
                                                <i class="ft-alert-triangle icon-bg-circle bg-warning bg-darken-3 mr-0"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading <?= $dt['info'] ?> darken-3">
                                                    <?= lang('app.notification') ?>: <b><?= lang('app.'. $dt['title']) ?></b>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted"><b><?= $dt['description'] ?> لـ <span class="badge badge-pill badge-<?= $dt['info'] ?>"><?= $user->find($dt['userId'])['name']; ?></span></b></p>
                                                <small>
                                                    <span class="media-meta text-muted"><?= date("d/m/Y H:m:s", strtotime($dt['created_at'])) ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </span>
                                    <?php endforeach ?>
                                </li>
                            </ul>
                        </li>
                        <?php endif ?>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1 user-name text-bold-700"><?= session('name') ?></span><span class="avatar avatar-online">
                                    <img src="https://ui-avatars.com/api/?name=<?= sprintf('%04s', session('malaf')) ?>&background=random&length=4" alt="avatar"><i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= base_url('user/profile/' . session('id')) ?>">
                                    <i class="ft-user"></i> <?= lang('app.profile') ?>
                                </a>
                                <a class="dropdown-item" href="<?= base_url('change/password') ?>">
                                    <i class="ft-check-square"></i> <?= lang('app.passchange') ?>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                    <i class="ft-power"></i> <?= lang('app.logout') ?></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>