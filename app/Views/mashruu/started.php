<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <?php if (count($start)>=1) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                <b><?= $title ?> <?= lang('app.now') ?> 
                                <span class="badge badge badge-warning badge-pill mr-2"><?= lang('app.start') ?></span></b>
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
                                            <th><?= lang('app.iban') ?></th>
                                            <th><?= lang('app.date') ?></th>
                                            <th><?= lang('app.miqat') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($start as $key => $dt) : ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><span class="badge badge-<?= ( $dt['role']=='mushrif'?'success':'') ?>"><?= sprintf('%04s', $dt['malaf']) ?></span></td>
                                                <td><?= $dt['name'] ?></td>
                                                <td><?= $dt['iqama'] ?></td>
                                                <td><a href="tel:+966<?= $dt['phone'] ?>" class="badge badge-secondary">0<?= $dt['phone'] ?></a></td>
                                                <td><?= $dt['iban'] ?></td>
                                                <td><?= $dt['tnfdhDate'] ?></td>
                                                <td><a href="https://www.latlong.net/c/?lat=<?= $dt['miqatLat'] ?>&long=<?= $dt['miqatLong'] ?>" target="_blank" class="btn btn-sm round btn-primary"><?= lang('app.miqat') ?></a></td>
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