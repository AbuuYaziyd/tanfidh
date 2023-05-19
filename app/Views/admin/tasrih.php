<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php if (count($tasrih) > 0 && session('role') == 'admin') :?>
    <div class="card">
        <div class="card-content">
            <div class="row p-1 m-1">
                <div class="col">
                    <a href="<?= base_url('tanfidh/download/'.date('his')) ?>" class="btn btn-lg btn-block btn-primary"><?= lang('app.download') ?> <?= lang('app.tasrihs') ?></a>
                </div>
            </div>
        </div>
    </div>
    <section id="configuration">
        <div class="row">
            <?php foreach ($tasrih as $dt) : ?>
                <?php if ($dt['tasrih']!=null && $dt['tnfdhDate']>=date('Y-m-d')) : ?>
                    <div class="col-md-4">
                        <a href="<?= base_url('admin/tasrih-user/'.$dt['userId']) ?>">
                            <div class="card">
                                <div class="card-content">
                                    <div style="text-align: center;">
                                        <h3 class="m-1"><?= $dt['tnfdhId'] ?>. <?= $dt['name'] ?></h3>
                                        <?php if ($dt['mulahadha'] != null) : ?>
                                        <span class="badge badge-pill badge-danger badge-up badge-glow" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= $dt['mulahadha'] ?>">!!!</span>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </section>
<?php endif ?>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script>
    $('delete').on('click', function(e) {
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