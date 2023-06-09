
<?php

use App\Models\User;

$usr = new User();

$user = $usr->find(session('id'));
?>
<div class="col-12">
    <?php if (isset($umra)) : ?>
        <?php if ($umra['tnfdhStatus'] ==1) : ?>
            <div class="card">
                <div class="card-body">
                    <h3>
                        <span class="btn btn-primary btn-lg round box-shadow-2"><?= $umra['tnfdhName'] ?></span>
                        <span class="btn btn-lg btn-<?= $umra['tnfdhSabab']=='dead'?'danger':'warning' ?> box-shadow-2 round pull-left"><?= lang('app.'.$umra['tnfdhSabab']) ?></span>
                    </h3>
                </div>
            </div>
        <?php  endif ?>
    <?php  endif ?>
</div>
<div class="col-md-4">
    <div class="card crypto-card-3 pull-up">
        <div class="card-content">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-2">
                        <i class="ft ft-airplay  warning font-large-2" title="BTC"></i>
                    </div>
                    <div class="col-7 pl-2">
                        <h4><?= lang('app.umrahcount') ?></h4>
                        <h6 class="text-muted"><?= lang('app.maashaallah') ?></h6>
                    </div>
                    <div class="col-3 text-right">
                        <h2><span class="badge badge-warning badge-pill"><?= count($all) ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div><canvas id="btc-chartjs" class="height-75 chartjs-render-monitor" style="display: block; width: 569px; height: 75px;" width="1138" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4 col-12">
    <div class="card crypto-card-3 pull-up">
        <div class="card-content">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-2">
                        <i class="ft ft-check-circle blue-grey lighten-1 font-large-2" title="ETH"></i>
                    </div>
                    <div class="col-8 pl-2">
                        <h4><?= lang('app.umrahmonth') ?></h4>
                        <h6 class="text-muted"><?= lang('app.tabaaraka') ?></h6>
                    </div>
                    <div class="col-2 text-right">
                        <h2><span class="badge badge-secondary badge-pill"><?= count($month) ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div><canvas id="eth-chartjs" class="height-75 chartjs-render-monitor" width="1138" height="150" style="display: block; width: 569px; height: 75px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($umra)) : ?>
    <div class="col-md-4 col-12">
        <a href="<?= base_url('umrah') ?>">
            <div class="card crypto-card-3 pull-up">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <i class="ft ft-cloud-drizzle info font-large-2" title="XRP"></i>
                            </div>
                            <div class="col-6 pl-2">
                                <h4><?= lang('app.tanfidh') . ' ' . lang('app.next') ?></h4>
                                <h6 class="text-muted"><?= lang('app.baarik') ?></h6>
                            </div>
                            <div class="col-4 text-right">
                                <?php if ($umra['tasrih']==null) : ?>
                                    <h4 class="btn btn-danger round blink"><b><?= lang('app.tasrih') ?></b></h4>
                                <?php elseif ($umra['tnfdhStatus']==null) : ?>
                                    <h4 class="btn btn-warning round blink"><b><?= lang('app.mushrif') ?></b></h4>
                                <?php elseif ($umra['tnfdhStatus']==0) : ?>
                                    <h4 class="btn btn-success round blink"><b><?= lang('app.underAction') ?></b></h4>
                                <?php else : ?>
                                    <h4 class="btn btn-amber round typewriter"><b><?= lang('app.tanfidh') ?><br> <?= lang('app.umrah') ?></b></h4>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div><canvas id="xrp-chartjs" class="height-75 chartjs-render-monitor" width="1138" height="150" style="display: block; width: 569px; height: 75px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php elseif ($set && $user['umrah']==null) : ?>
    <div class="col-md-4 col-12">
        <a href="<?= base_url('umrah') ?>">
            <div class="card crypto-card-3 pull-up">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <i class="ft ft-cloud-drizzle success font-large-2" title="XRP"></i>
                            </div>
                            <div class="col-7">
                                <h4><?= lang('app.tanfidh') . ' ' . lang('app.next') ?></h4>
                                <h6 class="text-muted"><?= lang('app.baarik') ?></h6>
                            </div>
                            <div class="col-3 text-right">
                                <h4 class="btn btn-purple round blink"><b><?= lang('app.register') ?></b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 height-75" style="text-align: center;">
                            <span class="mt-3 btn btn-info btn-pill"><?= lang('app.tasrihDate') ?> - <?= date('d/m/Y', strtotime($set['extra'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php else : ?>
    <div class="col-md-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-2">
                            <i class="ft ft-cloud-drizzle info font-large-2" title="XRP"></i>
                        </div>
                        <div class="col-7 pl-2">
                            <h4><?= lang('app.tanfidh') . ' ' . lang('app.next') ?></h4>
                            <h6 class="text-muted"><?= lang('app.baarik') ?></h6>
                        </div>
                        <div class="col-3 text-right">
                            <?php if ($user['umrah']!=null) : ?>
                                <h4 class="btn btn-black round"><?= lang('app.done') ?></h4>
                            <?php else : ?>
                                <h4 class="btn btn-teal round"><?= lang('app.near') ?></h4>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div><canvas id="xrp-chartjs" class="height-75 chartjs-render-monitor" width="1138" height="150" style="display: block; width: 569px; height: 75px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (session('role') != 'user') : ?>
    <div class="col-md-3">
    <a href="<?= base_url('admin/all') ?>">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success"><?= (($judud>=1?$judud.'/':'')). $full ?></h3>
                            <h6><?= lang('app.students') ?> </h6>
                        </div>
                        <div>
                            <i class="icon-users success font-large-3 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?= (($full-$judud)/$full)*100 ?>%" aria-valuenow="<?= (($full-$judud)/$full)*100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<?php if ($tasrih >= 1) : ?>
    <div class="col-md-3">
        <a href="<?= base_url('tanfidh/tasrih') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info"><?= lang('app.tasrihs')  ?></h3>
                                <h6><?= $tasrih ?></h6>
                            </div>
                            <div>
                                <i class="icon-docs info font-large-3 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php endif ?>
<?php if ($tasrihAll >= 1) : ?>
<div class="col-md-3">
    <a href="<?= base_url('tanfidh') ?>">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="primary"><?= lang('app.tanfidh') ?></h3>
                            <?php if ($tasrihAll>0) : ?>
                                <h6><?= $tasrihAll ?></h6>
                            <?php else : ?>
                                <h6><?= lang('app.near') ?></h6>
                            <?php endif ?>
                        </div>
                        <div>
                            <i class="icon-pointer primary font-large-3 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<?php endif ?>
<div class="col-md-3">
    <a href="<?= base_url('admin/tanfidh') ?>">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="secondary"><?= lang('app.hadiya') ?></h3>
                            <h6><?= lang('app.allHadiya') ?></h6>
                        </div>
                        <div>
                            <i class="icon-directions secondary font-large-3 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-secondary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<?php endif ?>
        <div class="col-md-3">
            <a href="<?= base_url('user/profile/'.session('id')) ?>">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="teal"><?= lang('app.edit') ?></h3>
                                    <h6><?= lang('app.profile') ?></h6>
                                </div>
                                <div>
                                    <i class="la la-television teal font-large-3 float-right"></i>
                                </div>
                            </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-teal" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url('image') ?>">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="purple"><?= lang('app.data') ?></h3>
                                    <h6><?= lang('app.edit') ?> <?= lang('app.data') ?></h6>
                                </div>
                                <div>
                                    <i class="la la-newspaper-o purple font-large-3 float-right"></i>
                                </div>
                            </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-purple" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>