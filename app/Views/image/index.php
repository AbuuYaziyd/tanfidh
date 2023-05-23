<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">
                        <a class="mr-1" href="#">
                            <img src="https://ui-avatars.com/api/?name=<?= session('malaf') ?>&background=random&length=4" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                        </a>
                        <div class="media-body pt-25">
                            <h4 class="media-heading"><span class="users-view-name"><?= session('name') ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= $user['uni_name'] ?></span></h4>
                            <span><?= lang('app.malaf') ?>:</span>
                            <span class="users-view-id"><?= session('malaf') ?></span>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgIqama') ?>
                                    <a class="btn btn-outline-secondary box-shadow-2 round pull-left" href="<?= base_url('image/edit/' . session('id')).'/iqama' ?>"><?= lang('app.edit') ?></a>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIqama'] == null ? 'demo/iqama.jpg' : 'malaf/'.(session('malaf')==0000?'new':session('malaf')).'/') . $img['imgIqama']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['iqama'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgStu') ?>
                                    <a class="btn btn-outline-secondary box-shadow-2 round pull-left" href="<?= base_url('image/edit/' . session('id')).'/bitaqa' ?>"><?= lang('app.edit') ?></a>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgStu'] == null ? 'demo/stu.jpg' : 'malaf/'.(session('malaf')==0000?'new':session('malaf')).'/') . $img['imgStu']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['bitaqa'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgIban') ?>
                                    <a class="btn btn-outline-secondary box-shadow-2 round pull-left" href="<?= base_url('image/edit/' . session('id')).'/iban' ?>"><?= lang('app.edit') ?></a>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIban'] == null ? 'demo/iban.png' : 'malaf/'.(session('malaf')==0000?'new':session('malaf')).'/') . $img['imgIban']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['iban'] ?></b></span>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
<?= $this->endSection() ?>