<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <?php if ($not != null) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2><?= $title ?> <span class="badge badge-danger badge-pill"><?= lang('app.notdone') ?></span></h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?= lang('app.malaf') ?></th>
                                                <th><?= lang('app.name') ?></th>
                                                <th><?= lang('app.iqama') ?></th>
                                                <th><?= lang('app.phone') ?></th>
                                                <th><?= lang('app.level') ?></th>
                                                <th><?= lang('app.bank') ?></th>
                                                <th><?= lang('app.iban') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($not as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $data['malaf'] ?></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                    <td><?= $data['uni_name'] ?></td>
                                                    <td><?= $data['bankName'] ?></td>
                                                    <td><?= $data['iban'] ?></td>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2><?= $title ?> <span class="badge badge-info badge-pill"><?= lang('app.done') ?></span></h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?= lang('app.malaf') ?></th>
                                                <th><?= lang('app.name') ?></th>
                                                <th><?= lang('app.iqama') ?></th>
                                                <th><?= lang('app.phone') ?></th>
                                                <th><?= lang('app.jamia') ?></th>
                                                <th><?= lang('app.bank') ?></th>
                                                <th><?= lang('app.iban') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($month as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $data['malaf'] ?></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                    <td><?= $data['uni_name'] ?></td>
                                                    <td><?= $data['bankName'] ?></td>
                                                    <td><?= $data['iban'] ?></td>
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
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>