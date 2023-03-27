<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <section class="users-view">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">
                        <div class="mr-1">
                            <img src="https://ui-avatars.com/api/?name=<?= session('malaf') ?>&background=random&length=4" alt="users view avatar" class="users-avatar-shadow rounded-circle " height="64" width="64">
                        </div>
                            
                        <div class="media-body pt-25">
                            <h4 class="media-heading">
                                <span class="users-view-name"><?= session('name') ?> </span>
                                <span class="text-muted font-medium-1"> @</span>
                                <span class="users-view-username text-muted font-medium-1 "><?= lang('app.admin') ?></span>
                            </h4>
                            <span><?= lang('app.malaf') ?>:</span>
                            <span class="users-view-id"><?= sprintf('%04s',session('malaf')) ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                            <div class="col-12 col-sm-4 p-2">
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><?= lang('app.name') ?>:</td>
                                        <td><b><?= $user['name'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.malaf') ?>:</td>
                                        <td><b><?= sprintf('%04s', ($user['malaf']??'----')) ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.nationality') ?>:</td>
                                        <td><b><?= $user['country_arName'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.phone') ?>:</td>
                                        <td><a href="tel:+966<?= $user['phone'] ?>" class="btn btn-secondary round btn-sm"><b><?= '966' . $user['phone'] ?></b></a></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.bank') ?>:</td>
                                        <td><b><?= $user['bankName'] ?> - <?= $user['bankShort'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.iban') ?>:</td>
                                        <td><b><?= $user['iban'] ?></b></td>
                                    </tr>


                                </tbody>
                            </table><a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-lg btn-block btn-primary mt-2"><?= lang('app.edit') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>