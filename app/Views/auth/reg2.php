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
                                    <img src="https://ui-avatars.com/api/?background=random&&name=2&&rounded=true" alt="logo" height="120px">
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.signup') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('register-third-step') ?>
                            <label class="text-bold-600 mt-1"><?= lang('app.bank') ?></label>
                            <?php if ($validation->getError('bank')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('bank') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select name="bank" class="select2 form-control">
                                    <option disabled selected><?= lang('app.choose') . ' ' . lang('app.bank') ?></option>
                                    <?php foreach ($bank as $key => $data) : ?>
                                        <option value="<?= $data['bankId'] ?>"><?= $data['bankName'].' - '.$data['bankShort'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-money"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.iban') ?></label>
                            <?php if ($validation->getError('iban')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('iban') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="iban" placeholder="<?= lang('app.iban') ?>" value="<?= old('iban') ?>">
                                <div class="form-control-position">
                                    <i class="la la-cc-mastercard"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-info btn-lg btn-block"><?= lang('app.send') ?></button>
                            <fieldset>
                                <input type="text" class="form-control my-1"  value="<?= $jamia['uni_name'] ?>" readonly>
                                <input type="hidden" name="jamia" value="<?= $jamia['uni_id'] ?>">
                            </fieldset>
                            <fieldset>
                                <input type="text" class="form-control mb-1" value="<?= $nat['country_arName'] ?>" readonly>
                                <input type="hidden" name="nat" value="<?= $nat['country_code'] ?>">
                            </fieldset>
                            <fieldset>
                                <input type="text" class="form-control mb-1" value="<?= lang('app.mushrif').': '. $mushrif['name'] ?>" readonly>
                                <input type="hidden" name="mushrif" value="<?= $mushrif['id'] ?>">
                            </fieldset>
                            </form>
                        </div>
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
            text: "اكتمل عدد المسجيلين!",
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