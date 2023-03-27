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
                                    <?= $title ?> <span class="badge badge badge-info badge-pill mr-2"><?= count($users) ?></span>
                                    <?php if (count($users)>0) : ?>
                                        <form action="<?= base_url('admin/activate-all') ?>" method="post">
                                            <?php foreach ($users as $key => $value) : ?>
                                                <input type="hidden" name="id[]" value="<?= $value['id'] ?>">
                                            <?php endforeach ?>
                                            <button type="submit" class="btn btn-outline-success box-shadow-2 round pull-right"><?= lang('app.activate') ?></button>
                                        </form>
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
                                                <th><?= lang('app.level') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><a href="<?= base_url('admin/activate/' . $data['id']) ?>" class="badge badge-<?= ( $data['status']==1?'danger':'success') ?>"><?= ( $data['malaf']??lang('app.underAction')) ?></a></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
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