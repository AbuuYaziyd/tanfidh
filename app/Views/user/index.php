<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div id="crypto-stats-3" class="row">
        <?= $this->include('user/info') ?>
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
        <!-- <div class="col-md-3">
            <a href="https://abuuyaziyd.github.io/test/student/index.html" target="_blank">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info"><?= lang('app.howTo') ?></h3>
                                    <h6><?= lang('app.howTos') ?></h6>
                                </div>
                                <div>
                                    <i class="la la-lightbulb-o info font-large-3 float-right"></i>
                                </div>
                            </div>
                            
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
    </div>
<?= $this->endSection() ?>