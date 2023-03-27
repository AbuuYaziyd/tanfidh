<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="row">
            <div class="card col-md-4 col-sm-12">
                <div class="text-center">
                    <div class="card-body">
                        <img src="https://ui-avatars.com/api/?name=<?= $user['name'] ?>&background=random&length=1&font-size=0.7" class="rounded-circle  height-150" alt=" avatar">
                    </div>
                    <div class="card-body">
                        <h1 class="card-subtitle mb-1"><?= $user['malaf'] ?></h1>
                        <p class="card-subtitle mb-1"><?= $user['name'] ?></p>
                        <p class="card-subtitle mb-1"><?= $user['iqama'] ?></p>
                        <p class="card-subtitle mb-1"><?= $user['phone'] ?></p>
                        <p class="card-subtitle mb-1"><?= $user['jamia'] ?></p>
                        <p class="card-subtitle mb-1"><?= $user['email'] ?></p>
                    </div>
                    <div class="text-center">
                        <a href="<?= base_url('admin/delete/' . $user['id']) ?>" id="delete" class="btn btn-sm btn-danger round mr-1 mb-1"><span class="la la-trash"></span><?= lang('app.delete') ?></a>
                    </div>
                </div>
            </div>
            <div id="recent-transactions" class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Recent Transactions</h3>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0"><?= lang('app.umrano') ?></th>
                                        <th class="border-top-0"><?= lang('app.donefor') ?></th>
                                        <th class="border-top-0"><?= lang('app.status') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td class="text-truncate"><a href="#">INV-001001</a></td>
                                    <td class="text-truncate">
                                        <span>Elizabeth W.</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-success round"><?= lang('app.done') ?></button>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><a href="#">INV-001002</a></td>
                                        <td class="text-truncate">
                                            <span>Doris R.</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-success round"><?= lang('app.done') ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><a href="#">INV-001003</a></td>
                                        <td class="text-truncate">
                                            <span>Megan S.</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-success round"><?= lang('app.done') ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><a href="#">INV-001004</a></td>
                                        <td class="text-truncate">
                                            <span>Andrew D.</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger round"><?= lang('app.notdone') ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><a href="#">INV-001005</a></td>
                                        <td class="text-truncate">
                                            <span>Walter R.</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger round"><?= lang('app.notdone') ?></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
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