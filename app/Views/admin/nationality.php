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
                                    <?= $title ?>
                                </h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <?php foreach ($nationality as $key => $data) : ?>
                                        <a href="<?= base_url('admin/nat/' . $data['nat']) ?>" class="btn btn-outline-secondary round m-1"><i class="flag-icon flag-icon-<?= strtolower($data['nat']) ?>"></i> - <?= $data['nationality'] ?> (<?= $data['jm'] ?>)</a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?= $this->endsection() ?>