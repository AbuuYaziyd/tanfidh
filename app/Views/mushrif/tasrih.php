<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <a href="<?= base_url('tanfidh/download/'.date('0h7is')) ?>" class="btn btn-lg btn-primary btn-block"><?= lang('app.download') ?> <?= lang('app.tasrih') ?></a>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($tasrih as $dt) : ?>
                        <?php if ($dt['tasrih']!=null && $dt['tnfdhDate']>=date('Y-m-d')) : ?>
                            <div class="col-md-4">
                                <a href="<?= base_url('mushrif/tasrih-user/'.$dt['userId']) ?>">
                                    <div class="card">
                                        <div class="card-content">
                                            <div style="text-align: center;">
                                                <h3 class="m-1"><?= $dt['name'] ?></h3>
                                                <?php if ($dt['mulahadha'] != null) : ?>
                                                <span class="badge badge-pill badge-danger badge-up badge-glow" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= $dt['mulahadha'] ?>">!!!</span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </section>
        </div>
    </div>
<?= $this->endsection() ?>