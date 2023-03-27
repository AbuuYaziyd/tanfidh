<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2><?= $title ?> 
                                    <span class="badge badge-warning badge-pill"><?= count($users) ?></span></h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard" style="text-align: center;">
                                    <?php if ($type != 'mushrif') : ?>
                                        <?php foreach ($users as $key => $data) : ?>
                                            <?php if ($type == 'nat') : ?>
                                                <a href="<?= base_url('admin/users/'. $data['nationality'].'/'. $data['jamia']) ?>" class="btn btn-outline-primary round m-1"><?= $data['uni_name'] ?> - <?= $data['name'] ?></a>
                                            <?php elseif ($type == 'jamia') : ?>
                                                <a href="<?= base_url('admin/users/'. $data['nationality'].'/'. $data['jamia']) ?>" class="btn btn-outline-primary round m-1"><i class="flag-icon flag-icon-<?= strtolower($data['nationality']) ?>"></i> - <?= $data['name'] ?></a>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <?= $title2 ?>
                                    <span class="badge badge-info badge-pill"><?= count($all) ?></span>
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
                                                    <th><?= lang('app.jamia') ?> - <?= lang('app.nationality') ?></th>
                                                <?php elseif ($type == 'nat') : ?>
                                                    <th><?= lang('app.jamia') ?></th>
                                                <?php elseif ($type == 'jamia') : ?>
                                                    <th><?= lang('app.nationality') ?></th>
                                                <?php endif ?>
                                                <th><?= lang('app.level') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($all as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><a href="<?= base_url('admin/show/' . $data['id']) ?>" class="badge badge-pill badge-<?= ($data['role']=='mushrif'?'warning':'info') ?>"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                    <td><span <?= ( $data['role']=='mushrif'?'class="badge badge-success"':'') ?>><?= $data['name'] ?></span></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                    <?php if ($type == 'mushrif') : ?>
                                                        <td><a href="<?= base_url('admin/users/'. $data['nationality'].'/'. $data['jamia']) ?>" class="btn btn-sm round btn-outline-info"><?= $data['uni_name'] ?> - <?= $data['country_arName'] ?></a></td>
                                                    <?php elseif ($type == 'nat') : ?>
                                                        <td><?= $data['uni_name'] ?></td>
                                                    <?php elseif ($type == 'jamia') : ?>
                                                        <td><?= $data['country_arName'] ?></td>
                                                    <?php endif ?>
                                                    <td><?= $data['level'] ?></td>
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