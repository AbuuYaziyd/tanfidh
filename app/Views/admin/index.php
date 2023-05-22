<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <div class="row">
    <?= $this->include('user/info') ?>
        <div class="col-md-3">
            <a href="<?= base_url('set') ?>">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger"><?= lang('app.settings') ?></h3>
                                    <h6><?= lang('app.settings') ?> <?= lang('app.website') ?></h6>
                                </div>
                                <div>
                                    <i class="icon-settings spinner danger font-large-3 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?= $this->endSection() ?>