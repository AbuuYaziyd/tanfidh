<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <?php if ($done) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                <b><?= $title ?> <span class="btn btn-success round"><?= lang('app.done') ?></span></b>
                                    <a href="<?= base_url('tanfidh/delete') ?>" class="btn pull-left round btn-danger delete <?= count($done)<1?'disabled':'' ?>"><?= lang('app.delete') ?></a>
                            </h2>
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
                                            <th><?= lang('app.nationality') ?></th>
                                            <th><?= lang('app.jamia') ?></th>
                                            <th><?= lang('app.ism') ?></th>
                                            <th><?= lang('app.sabab') ?></th>
                                            <th><?= lang('app.date') ?></th>
                                            <th><?= lang('app.amount') ?></th>
                                            <th><?= lang('app.iban') ?></th>
                                            <th><?= lang('app.bank') ?></th>
                                            <th><?= lang('app.miqat') ?></th>
                                            <th><?= lang('app.makkah') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($done as $key => $dt) : ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><span class="badge badge-<?= ( $dt['role']=='mushrif'?'success':'') ?>"><?= sprintf('%04s', $dt['malaf']) ?></span></td>
                                                <td><?= $dt['name'] ?></td>
                                                <td><?= $dt['iqama'] ?></td>
                                                <td><a href="tel:+966<?= $dt['phone'] ?>" class="badge badge-secondary">966<?= $dt['phone'] ?></a></td>
                                                <td><?= $dt['country_arName'] ?></td>
                                                <td><?= $dt['uni_name'] ?></td>
                                                <td><?= $dt['ism'] ?></td>
                                                <td><?= $dt['sabab'] ?></td>
                                                <td><?= $dt['date'] ?></td>
                                                <td><?= $dt['amount'] ?></td>
                                                <td><?= $dt['iban'] ?></td>
                                                <td><?= $dt['bankName'] ?> - <?= $dt['bankShort'] ?></td>
                                                <td><a href="https://www.latlong.net/c/?lat=<?= $dt['miqatLat'] ?>&long=<?= $dt['miqatLong'] ?>" target="_blank" class="btn btn-sm round btn-primary"><?= lang('app.miqat') ?></a></td>
                                                <td><a href="https://www.latlong.net/c/?lat=<?= $dt['makkahLat'] ?>&long=<?= $dt['makkahLong'] ?>" target="_blank" class="btn btn-sm round btn-warning"><?= lang('app.makkah') ?></a></td>
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
    $('.delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: 'هل ترييد أن تحذف جميع البينات!؟',
            html: "حقق أنك: <br>1) أنزلت ملف إكسيل؟ <br>2) أنزلت جميع التصاريح في صفحة التصارح؟",
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
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'تمام',
                    text: 'ما حذفت شيء :)',
                    type: 'error',
                    showConfirmButton: false,
                })
            }
        })
    });
</script>
<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>