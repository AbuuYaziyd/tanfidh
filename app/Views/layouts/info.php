<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="info"><?= $all ?></h3>
                            <h6><?= lang('app.students') ?></h6>
                        </div>
                        <div>
                            <i class="icon-users info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?= ($all / $all) * 100 ?>%" aria-valuenow="<?= ($all / $all) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="warning"><?= $judud ?></h3>
                            <h6><?= lang('app.tanfidh') ?></h6>
                        </div>
                        <div>
                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success"><?= $judud . '/' . $all ?></h3>
                            <h6><?= lang('app.judud') ?></h6>
                        </div>
                        <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?= $judud / $all ?>%" aria-valuenow="<?= ($judud / $all) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="danger"><?= $status . '/' . $complt ?></h3>
                            <h6><?= lang('app.tanfidh') ?></h6>
                        </div>
                        <div>
                            <i class="icon-heart danger font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?= ($complt == 0 ? 0 : $status / $complt) ?>%" aria-valuenow="<?= ($complt == 0 ? 0 : $status / $complt) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DASH -->
<?= $this->include('user/info') ?>
<!-- !DASH -->