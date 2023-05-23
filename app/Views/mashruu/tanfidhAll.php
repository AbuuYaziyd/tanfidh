<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <?php if ($all != null) : ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>
                            <b><?= $title ?></b>
                            <a href="<?= base_url('admin/tanfidh') ?>" class="btn btn-outline-warning round pull-left"><?= lang('app.back') ?>
                            </a>
                        </h2>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered responsive text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?= lang('app.malaf') ?></th>
                                        <th><?= lang('app.name') ?></th>
                                        <th><?= lang('app.iqama') ?></th>
                                        <th><?= lang('app.phone') ?></th>
                                        <th><?= lang('app.nationality') ?></th>
                                        <th><?= lang('app.jamia') ?></th>
                                        <th><?= lang('app.ism') ?></th>
                                        <th><?= lang('app.sabab') ?></th>
                                        <th><?= lang('app.date') ?></th>
                                        <th><?= lang('app.bank') ?></th>
                                        <th><?= lang('app.ramz') ?> <?= lang('app.bank') ?></th>
                                        <th><?= lang('app.iban') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all as $key => $dt) : ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><span class="badge badge-pill badge-<?= ( $dt['name']==$dt['mushrif']?'success':'info') ?>"><?= sprintf('%04s', $dt['malaf']) ?></span></td>
                                            <td><?= $dt['name'] ?></td>
                                            <td><?= $dt['iqama'] ?></td>
                                            <td><a href="tel:+966<?= $dt['phone'] ?>" class="badge badge-secondary">966<?= $dt['phone'] ?></a></td>
                                            <td>تنزانيا</td>
                                            <td>الجامعة الإسلامية</td>
                                            <td><?= $dt['ism'] ?></td>
                                            <td><span class="badge badge-pill badge-<?= $dt['sabab']=='dead'?'danger':'warning' ?>"><?= lang('app.'.$dt['sabab']) ?></span></td>
                                            <td><?= date('d/m/Y', strtotime($dt['date'])) ?></td>
                                            <td><?= $dt['bank'] ?></td>
                                            <td><?= $dt['code'] ?></td>
                                            <td><?= $dt['iban'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>