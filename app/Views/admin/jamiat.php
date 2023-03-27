<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>
                                        <?= $title ?> <span class="badge badge-info badge-pill"><?= count($jamia) ?></span>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <?php foreach ($jamia as $key => $data) : ?>
                                            <a href="<?= base_url('admin/jamia/'.$data['uni']) ?>" class="btn btn-info round m-1"><?= $data['jamia'] ?> (<?= $data['jm'] ?>)</a>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
<?= $this->endSection() ?>