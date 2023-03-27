<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <b><?= lang('app.peopletobedonefor') ?></b>
                        <a href="<?= base_url('tanfidh/tasrih') ?>" class="btn pull-left round btn-black" target="_blank"><?= lang('app.tasrih') ?> 
                            <span class="badge badge-info badge-pill"><?= $tanfidh ?></span>
                        </a>
                    </h3>
                </div>
                <div class="card-content">
                    <?php $validation = \Config\Services::validation(); ?>
                    <?= form_open_multipart('tanfidh/create') ?>
                        <div class="row p-1 m-1">
                            <div class="col-md-4">
                                <a href="<?= base_url('app-assets/tanfidh.csv') ?>" download="tanfidh.csv" class="btn btn-outline-success btn-block round m-2">tanfdh.csv</a>
                            </div>
                            <div class="col-md-8">
                                <label class="ml-1"><b><?= lang('app.chooseFileIfyouhavedownlad') ?></b></label>
                                <?php if ($validation->getError('csv')) : ?>
                                    <span class="badge badge-danger"> <?= $errors = $validation->getError('csv') ?></span>
                                <?php endif ?>
                                <div class="input-group ">
                                    <div class="custom-file">
                                        <input type="file" name="csv" id="image" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label"><?= lang('app.chooseFile') ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row px-1 mb-1">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><?= lang('app.add') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($wait>0) : ?>
            <div class="col-md-4 mb-1">
                <a href="<?= base_url('tanfidh/connect') ?>" class="btn btn-block btn-outline-warning btn-lg" <?= $wait>0?'':'style="pointer-events: none;"' ?>><?= lang('app.waiting') ?> (<?= $wait ?>)</a>
            </div>
            <div class="col-md-4 mb-1">
                <a href="<?= base_url('tanfidh/start') ?>" class="btn btn-block btn-outline-info btn-lg" <?= $start>0?'':'style="pointer-events: none;"' ?>><?= lang('app.start') ?> (<?= $start ?>)</a>
            </div>
            <div class="col-md-4 mb-1">
                <a href="<?= base_url('tanfidh/done') ?>" class="btn btn-block btn-outline-black btn-lg"><?= lang('app.done') ?> (<?= $done ?>)</a>
            </div>
            <?php elseif ($start>0) : ?>
            <div class="col-md-6 mb-1">
                <a href="<?= base_url('tanfidh/start') ?>" class="btn btn-block btn-outline-info btn-lg" <?= $start>0?'':'style="pointer-events: none;"' ?>><?= lang('app.start') ?> (<?= $start ?>)</a>
            </div>
            <div class="col-md-6 mb-1">
                <a href="<?= base_url('tanfidh/done') ?>" class="btn btn-block btn-outline-black btn-lg"><?= lang('app.done') ?> (<?= $done ?>)</a>
            </div>
            <?php elseif ($done>0) : ?>
            <div class="col mb-1">
                <a href="<?= base_url('tanfidh/done') ?>" class="btn btn-block btn-outline-black btn-lg"><?= lang('app.done') ?> (<?= $done ?>)</a>
            </div>
            <?php endif ?>
        </div>
        <?php if ($new1) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                <b><?= $title ?></b> 
                                <span class="badge badge badge-info badge-pill mr-2"><?= $tanfidh ?></span>
                            </h2>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered dataex-res-constructor">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?= lang('app.ism') ?></th>
                                            <th><?= lang('app.sabab') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($new1 as $key => $dt) : ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $dt['ism'] ?></td>
                                                <td><?= $dt['sabab'] ?></td>
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
<script>
    (function (window, document, $) {
        'use strict';
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    })(window, document, jQuery);
</script>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>