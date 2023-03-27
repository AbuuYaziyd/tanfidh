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
                                    <table class="table table-striped table-bordered dataex">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?= lang('app.malaf') ?></th>
                                                <th><?= lang('app.name') ?></th>
                                                <th><?= lang('app.iqama') ?></th>
                                                <th><?= lang('app.phone') ?></th>
                                                <th><?= lang('app.level') ?></th>
                                                <th><?= lang('app.edit') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><span class="badge badge-<?= ( $data['status']==null?'danger':'success') ?>"><?= ( $data['malaf']!=null?lang('app.notactive'):lang('app.underAction')) ?></span></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                    <td><?= $data['level'] ?></td>
                                                    <td><a href="<?= base_url('mushrif/active/' . $data['id']) ?>" class="btn btn-sm round btn-outline-warning <?= ( $data['status']==null?'':'disabled') ?>" ><?= lang('app.show') ?></a></td>
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