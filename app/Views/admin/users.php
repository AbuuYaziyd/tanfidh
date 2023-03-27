<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <?php if (isset($mushrif)) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <?= $mushrif['name'] ?> <a href="tel:/+966<?= $mushrif['phone'] ?>" class="badge badge-warning badge-pill">966<?= $mushrif['phone'] ?></a>
                                    <?php if (isset($mushrif['phone'])) : ?>
                                        <a class="btn btn-outline-success box-shadow-1 round pull-left" href="https://wa.me/966<?= $mushrif['phone'] ?>" target="_blank"><?= lang('app.whatsapp') ?> - <?= lang('app.mushrif') ?></a>
                                    <?php endif ?>
                                </h2>
                            </div>
                            <div class="card-content collapse show">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <?= $title ?> <span class="badge badge-info badge-pill"><?= count($users) ?></span>
                                    <?php if (isset($whats['link'])) : ?>
                                        <a class="btn btn-success box-shadow-1 round pull-left" href="<?= $whats['link'] ?>" target="_blank"><?= lang('app.whatsapp') ?> - <?= lang('app.group') ?></a>
                                    <?php endif ?>
                                </h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered dataex-res-constructor">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?= lang('app.malaf') ?></th>
                                                <th><?= lang('app.name') ?></th>
                                                <th><?= lang('app.iqama') ?></th>
                                                <th><?= lang('app.phone') ?></th>
                                                <?php if ($type == 'mushrif') : ?>
                                                    <th><?= lang('app.jamia') ?> - <?= lang('app.nationality') ?>  (<?= lang('app.link') ?>)</th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><a href="<?= base_url('admin/show/' . $data['id']) ?>" class="badge badge-pill badge-<?= ($data['role']=='mushrif'?'warning':'info') ?>"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                    <td><span <?= ( $data['role']=='mushrif'?'class="badge badge-success"':'') ?>><?= $data['name'] ?></span></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                    <?php if ($type == 'mushrif') : ?>
                                                        <td><a href="<?= base_url('admin/users/'. $data['nationality'].'/'. $data['jamia']) ?>" class="btn btn-sm round btn-outline-info"><?= $data['uni_name'] ?> - <?= $data['country_arName'] ?></a></td>
                                                    <?php endif ?>
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
<?= $this->endsection() ?>
<?= $this->include('layouts/table') ?>