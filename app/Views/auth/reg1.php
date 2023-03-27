<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0 mb-2">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-1">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <a href="<?= base_url() ?>">
                                    <img src="https://ui-avatars.com/api/?background=random&&name=1&&rounded=true" alt="logo" height="120px">
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.signup') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('register-second-step') ?>
                            <label class="text-bold-600"><?= lang('app.nationality') ?></label>
                            <?php if ($validation->getError('nationality')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('nationality') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select class="select2 form-control" name="nationality">
                                    <option selected disabled><?= lang('app.choose') . ' ' . lang('app.nationality') ?></option>
                                    <?php foreach ($nat as $key => $data) : ?>
                                        <option value="<?= $data['country_code'] ?>"><?= $data['country_arName'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-flag"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.jamia') ?></label>
                            <?php if ($validation->getError('jamia')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('jamia') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select class="select2 form-control" name="jamia">
                                    <option selected disabled><?= lang('app.choose') . ' ' . lang('app.jamia') ?></option>
                                    <?php foreach ($uni as $key => $data) : ?>
                                        <option value="<?= $data['uni_id'] ?>"><?= $data['uni_name'] ?> - (<?= $data['uni_reg'] ?>)</option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-university"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-info btn-lg btn-block"><?= lang('app.send') ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-center"><?= lang('app.doyouhaveaccount') ?> <a href="<?= base_url('login') ?>" class="card-link"><?= lang('app.login') ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script>
    <?php if ($reg == 1) :  ?>
    $(document).ready(function () {
        url = "<?= base_url() ?>";
        Swal.fire({
            title: '<?= lang('app.sorry') ?>',
            text: "الحين ليست وقة للتسجيل بارك الله فيك!",
            type: 'info',
            showConfirmButton: true,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'تمام',
            confirmButtonClass: 'btn btn-info',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            } 
        })
    });
    <?php endif ?>
</script>
<?= $this->endSection() ?>