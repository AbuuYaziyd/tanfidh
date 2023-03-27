<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/ui/prism.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/file-uploaders/dropzone.min.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row">
                <div class="media-body pt-25 mb-3">
                    <h4 class="media-heading"><span class="users-view-name"><?= lang('app.data') ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= ($user['malaf']??lang('app.notactive')) ?></span></h4>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                    <a href="<?= base_url('mushrif/activate/' . $user['id']) ?>" id="activate" class="btn round btn-outline-secondary"><?= lang('app.activate') ?></a>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgIqama') ?>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIqama'] == null ? 'demo/iqama.jpg' : 'malaf/'.($user['malaf']??'new').'/') . $img['imgIqama']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['iqama'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgPass') ?>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgPass'] == null ? 'demo/passp.jpg' : 'malaf/'.($user['malaf']??'new').'/') . $img['imgPass']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['passport'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgStu') ?>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgStu'] == null ? 'demo/stu.jpg' : 'malaf/'.($user['malaf']??'new').'/') . $img['imgStu']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['bitaqa'] ?></b></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title"><?= lang('app.imgIban') ?>
                                </h4>
                                </div>
                                <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIban'] == null ? 'demo/iban.png' : 'malaf/'.($user['malaf']??'new').'/') . $img['imgIban']) ?>" alt="img">
                            </div>
                            <div style="text-align: center;" class="my-1">
                                <span><b><?= $user['iban'] ?></b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/js/ui/prism.min.js') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/js/extensions/dropzone.min.js') ?>">
<script src="<?= base_url('app-assets/js/scripts/extensions/dropzone.js') ?>"></script>
<script>
    $('#activate').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: '<?=lang('app.warning') ?>',
            text: '<?=lang('app.filesOkSms') ?>',
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
<?= $this->endsection() ?>