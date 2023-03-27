<?= $this->include('user/info') ?>
    <div class="col-md-3">
        <a href="<?= base_url('mushrif/users') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info"><?= lang('app.students') ?></h3>
                                <h6><?= $total . '/' . $full ?></h6>
                            </div>
                            <div>
                                <i class="icon-users info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?= ($total / $full) * 100 ?>%" aria-valuenow="<?= ($total / $full) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('mushrif/judud') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success"><?= lang('app.judud') ?></h3>
                                <h6><?= $judud0 ?>/<?= $total ?></h6>
                            </div><?php if ($judud1) : ?><span class="danger">(<?= $judud1 ?>)</span><?php endif ?>
                            <div>
                                <i class="icon-user-follow success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?= ($judud0 / $total) * 100 ?>%" aria-valuenow="<?= ($judud0 / $total) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php if ($tasrihAll >= 1) : ?>
        <div class="col-md-3">
            <a href="<?= base_url('mushrif/tasrih') ?>">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info"><?= lang('app.tasrihs')  ?></h3>
                                    <h6><?= $tasrihNow ?>/<?= $tasrihAll ?></h6>
                                </div>
                                <div>
                                    <i class="icon-docs info font-large-3 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?= ($tasrihNow / $tasrihAll) * 100 ?>%" aria-valuenow="<?= ($tasrihNow / $tasrihAll) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endif ?>
    <div class="col-md-3">
        <a href="<?= base_url('mushrif/tanfidh-shahr') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="black"><?= lang('app.thisMonth') ?></h3>
                                <h6><?= $status.'/'.$lead ?></h6>
                            </div>
                            <div>
                                <i class="icon-docs black font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-black" role="progressbar" style="width: <?= ($lead==0?0:$status/$lead) ?>%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('mushrif/tanfidh') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger"><?= lang('app.tanfidh') ?></h3>
                                <h6><?= count($month) ?>/<?= count($all) ?></h6>
                            </div>
                            <div>
                                <i class="icon-directions danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?= ($lead == 0?0: $status / $lead) ?>%" aria-valuenow="<?= ($lead == 0 ? 0 : $status / $lead) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>