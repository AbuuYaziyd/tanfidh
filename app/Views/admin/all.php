<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <?php if (count($judud)>=1) : ?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2><?= lang('app.judud') ?></h2>
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
                                                    <th><?= lang('app.jamia') ?></th>
                                                    <th><?= lang('app.nationality') ?></th>
                                                    <th><?= lang('app.bank') ?></th>
                                                    <th><?= lang('app.iban') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($judud as $key => $data) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><a href="<?= base_url('admin/show/' . $data['id']) ?>" class="badge badge-pill badge-<?= ($data['role']=='mushrif'?'warning':'info') ?>"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                        <td><?= $data['name'] ?></td>
                                                        <td><?= $data['iqama'] ?></td>
                                                        <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                        <td><?= $data['level'] ?></td>
                                                        <td><?= $data['uni_name'] ?></td>
                                                        <td><?= $data['country_arNationality'] ?></td>
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
                    <?php endif ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2><?= $title ?></h2>
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
                                                <th><?= lang('app.jamia') ?></th>
                                                <th><?= lang('app.nationality') ?></th>
                                                <th><?= lang('app.bank') ?></th>
                                                <th><?= lang('app.iban') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><a href="<?= base_url('admin/show/' . $data['id']) ?>" class="badge badge-pill badge-<?= ($data['role']=='mushrif'?'warning':'info') ?>"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                    <td><?= $data['level'] ?></td>
                                                    <td><?= $data['uni_name'] ?></td>
                                                    <td><?= $data['country_arNationality'] ?></td>
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
<?= $this->endsection() ?>
<?= $this->include('layouts/table') ?>