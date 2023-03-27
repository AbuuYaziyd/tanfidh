<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2><?= $title ?></h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard" style="text-align: center;">
                                        <?php if ($whats != null) : ?>
                                            <?php foreach ($whats as $key => $data) : ?>
                                                <a href="<?= base_url('whatsapp/show/'. $data['id']) ?>" class="btn btn-outline-primary round m-1"><?= $data['jamia_id'] ?> - <?= $data['country_code'] ?></a>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h2>
                                        <?= $title ?>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?= lang('app.nationality') ?></th>
                                                    <th><?= lang('app.jamia') ?></th>
                                                    <th><?= lang('app.link') ?></th>
                                                    <th><?= lang('app.phone') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($whats as $key => $data) : ?>
                                                    <tr>
                                                        <td><?= $key+1 ?></td>
                                                        <td><span><?= $data['country_code'] ?></span></td>
                                                        <td><?= $data['jamia_id'] ?></td>
                                                        <td><a href="<?= $data['link'] ?>" class="badge badge-secondary"><?= lang('app.whatsapp') ?></a></td>
                                                        <td><?= $data['id'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>
<?= $this->include('layouts/table') ?>