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
                                    <?php if (isset($whats)) : ?>
                                        <button class="btn btn-success box-shadow-1 round pull-left"  data-toggle="modal" data-target="#default"><?= lang('app.whatsapp') ?> - <?= lang('app.group') ?></button>
                                    <?php else : ?>
                                        <a class="btn btn-danger box-shadow-1 round pull-left" href="<?= base_url('whatsapp') ?>"><?= lang('app.whatsapp') ?> - <?= lang('app.group') ?></a>
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
                                                    <td><?= $key+1 ?></td>
                                                    <td><a href="<?= base_url('mushrif/user/' . $data['id']) ?>" class="badge badge-pill badge-<?= ( $data['role']=='mushrif'?'success':'') ?>" target="_blank"><?= $data['malaf'] ?></a></td>
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
<?php if (isset($whats)) : ?>
<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">
                            <?= lang('app.edit') ?> <?= lang('app.whatsapp') ?> <?= lang('app.group') ?>
                        </h4>
                        <?php if ($whats['link'] != null) : ?>
                        <a href="<?= $whats['link'] ?>" class="btn btn-info round float-right mr-2" target="_blank"><?= lang('app.whatsapp') ?></a>
                        <?php endif ?>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('whatsapp/edit/'.$whats['id']) ?>
                            <fieldset>
                                <label><b><?= lang('app.link') ?></b></label>
                                <input type="text" class="form-control" name="link" value="<?= $whats['link'] ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?= $this->endsection() ?>
<?= $this->include('layouts/table') ?>