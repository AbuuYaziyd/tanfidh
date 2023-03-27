<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="row">
            <div class="card col-md-4">
                <?php if (session('role') == 'admin') : ?>
                    <div class="card-header">
                        <a href="<?= base_url('admin/edit-mushrif/'.$user['id']) ?>" class="btn btn-black round <?= $user['mushrif']==null?'disabled':'' ?>"><?= lang('app.edit') ?> <?= lang('app.mushrif') ?> <span class="badge badge-info badge-pill"><?= $mushrif['name']??'' ?></span></a>
                    </div>
                <?php endif ?>
                <div class="text-center">
                    <div class="card-body">
                        <img src="https://ui-avatars.com/api/?name=<?= sprintf('%04s', $user['malaf']) ?>&background=random&length=4" class="rounded-circle  height-150" alt=" avatar">
                    </div>
                    <div class="card-body">
                        <h2><b><?= $user['name'] ?></b></h2>
                        <h4><b><?= $user['iqama'] ?></b></h4>
                        <h4><b><?= $user['country_arName'] ?></b></h4><br>
                        <div class="btn-group">
                                <a href="tel:+966<?= $user['phone'] ?>" class="btn btn-sm round btn-secondary"><i class="la la-mobile"></i> تواصل</a><a href="https://wa.me/966<?= $user['phone'] ?>" target="_blank" class="btn btn-success btn-sm round"> واتساب <i class="la la-whatsapp"></i></a>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/delete/' . $user['id']) ?>" id="delete" class="btn round btn-danger btn-block p-1 mb-1"> <i class="la la-trash"></i> <?= lang('app.delete') ?></a>
                </div>
            </div>
            
            <div id="recent-transactions" class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><b><?= lang('app.tanfidh') ?> - <?= $user['name'] ?></b></h3>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th><?= lang('app.date') ?></th>
                                        <th><?= lang('app.donefor') ?></th>
                                        <th><?= lang('app.status') ?></th>
                                        <th><?= lang('app.miqat') ?></th>
                                        <th><?= lang('app.makkah') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mashruu as $key => $dt) : ?>
                                    <tr>
                                        <td><b><?= $dt['date'] ?></b></td>
                                        <td>
                                            <?= $dt['ism'] ?> - <span class="badge badge-info badge-pill"><?= $dt['sabab'] ?></span>
                                        </td>
                                        <td>
                                            <?php if ($dt['status'] == 0) : ?>
                                            <button type="button" class="btn btn-sm btn-danger round"><?= lang('app.notdone') ?></button>
                                            <?php elseif ($dt['status'] == 1) : ?>
                                            <button type="button" class="btn btn-sm btn-success round"><?= lang('app.done') ?></button>
                                            <?php endif ?>
                                        </td>                                       
                                        <td>
                                            <a href="https://www.latlong.net/c/?lat=<?= $dt['miqatLat'] ?>&long=<?= $dt['miqatLong'] ?>" target="_blank" class="btn btn-sm round btn-primary"><?= lang('app.miqat') ?></a>
                                        </td>
                                        <td>
                                            <a href="https://www.latlong.net/c/?lat=<?= $dt['makkahLat'] ?>&long=<?= $dt['makkahLong'] ?>" target="_blank" class="btn btn-sm round btn-warning"><?= lang('app.makkah') ?></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ($img > 0) :?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgIqama') ?></h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIqama'] == null ? 'demo/iqama.jpg' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgIqama']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['iqama'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgStu') ?></h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgStu'] == null ? 'demo/stu.jpg' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgStu']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['bitaqa'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body"><h4 class="card-title">
                                    <?= lang('app.imgIban') ?></h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIban'] == null ? 'demo/iban.png' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgIban']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['iban'] ?></b></span>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endif ?>
    </div>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            // title: <?= lang('app.graduated?') ?>,
            title: 'أمتخرج هو؟',
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
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'تمام',
                    text: 'لا تحذف أي واحد إلا متخرجون :)',
                    type: 'error',
                    showConfirmButton: false,
                })
            }
        })
    });
</script>
<?= $this->endsection() ?>