
<?php 

use App\Models\Setting;

$set = new Setting();
$file = date('dmY', strtotime($set->where('info', 'tasrihDate')->first()['extra'])).'.zip';
// dd(file_exists(($file)));exit;
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="row mb-2">
            <?php if (file_exists($file)) : ?>
                <div class="col-6">
                    <a href="<?= base_url('tanfidh/download') ?>" class="btn btn-lg btn-primary btn-block"><?= lang('app.download') ?> <?= lang('app.tasrih') ?></a>
                </div> 
                <div class="col-6">
                    <a href="<?= base_url('tanfidh/delete') ?>" id="delete" class="btn btn-lg btn-danger btn-block"><?= lang('app.delete') ?> <?= lang('app.tasrih') ?></a>
                </div> 
            <?php else : ?>
                <div class="col-12">
                    <a href="<?= base_url('tanfidh/download') ?>" class="btn btn-lg btn-primary btn-block"><?= lang('app.download') ?> <?= lang('app.tasrih') ?></a>
                </div> 
            <?php endif ?>
        </div>
        <div class="row">
            <?php if (count($all)>0) : ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2><?= $title ?></h2>
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
                                            <th><?= lang('app.level') ?></th>
                                            <th><?= lang('app.jamia') ?></th>
                                            <th><?= lang('app.nationality') ?></th>
                                            <th><?= lang('app.bank') ?></th>
                                            <th><?= lang('app.ramz') ?> <?= lang('app.bank') ?></th>
                                            <th><?= lang('app.iban') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all as $key => $data) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><a href="<?= base_url('tanfidh/show/' . $data['tnfdhId']) ?>" class="badge badge-pill badge-info"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                <td><?= $data['name'] ?></td>
                                                <td><?= $data['iqama'] ?></td>
                                                <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                <td><?= $data['level'] ?></td>
                                                <td>الجامعة الإسلامية</td>
                                                <td>تنزانيا</td>
                                                <td><?= $data['bankName'] ?></td>
                                                <td><?= $data['bankShort'] ?></td>
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
            <?php if (count($ready)>0) : ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>تم التحاق مع صاحب العمرة</h2>
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
                                            <th><?= lang('app.ism') ?></th>
                                            <th><?= lang('app.sabab') ?></th>
                                            <th><?= lang('app.level') ?></th>
                                            <th><?= lang('app.jamia') ?></th>
                                            <th><?= lang('app.nationality') ?></th>
                                            <th><?= lang('app.bank') ?></th>
                                            <th><?= lang('app.ramz') ?> <?= lang('app.bank') ?></th>
                                            <th><?= lang('app.iban') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ready as $key => $data) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><a href="<?= base_url('tanfidh/show/' . $data['tnfdhId']) ?>" class="badge badge-pill badge-info"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                <td><?= $data['name'] ?></td>
                                                <td><?= $data['iqama'] ?></td>
                                                <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                <td><?= $data['tnfdhName'] ?></td>
                                                <td><span class="badge badge-pill badge-<?= $data['tnfdhSabab']=='dead'?'danger':'warning' ?>"><?= lang('app.'.$data['tnfdhSabab']) ?></span></td>
                                                <td><?= $data['level'] ?></td>
                                                <td>الجامعة الإسلامية</td>
                                                <td>تنزانيا</td>
                                                <td><?= $data['bankName'] ?></td>
                                                <td><?= $data['bankShort'] ?></td>
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
        </div>
    </div>
<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: 'تريد حذف التصاريح',
            text: "بعد الحذف خلاص فهو محذوف!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم!',
            cancelButtonText: 'لا!',
            confirmButtonClass: 'btn btn-warning',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            }
        })
    });
</script>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>