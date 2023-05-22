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
<?php if ($tasrihAll >= 1) : ?>
    <div class="col-md-3">
        <a href="<?= base_url('tanfidh/tasrih') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info"><?= lang('app.tasrihs')  ?></h3>
                                <h6><?= $tasrihAll ?></h6>
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
<div class="col-md-3">
    <a href="<?= base_url('tanfidh') ?>">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="primary"><?= lang('app.tanfidh') ?></h3>
                            <?php if ($tanfidh>0) : ?>
                                <h6><?= $tanfidh ?>/<?= $makka ?>/<?= $tasrihAll ?></h6>
                            <?php elseif ($tanfidh>0) : ?>
                                <h6><?= $makka ?>/<?= $tasrihAll ?></h6>
                            <?php elseif ($makka>0) : ?>
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