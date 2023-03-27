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
                                    <img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="logo" height="120px">
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.signup') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('secure') ?>
                            <label class="text-bold-600"><?= lang('app.nationality') ?></label>
                            <?php if ($validation->getError('nationality')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('nationality') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select class="select2 form-control" name="nationality" id="nat">
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
                                <select class="select2 form-control" name="jamia" id="jamia">
                                    <option selected disabled><?= lang('app.choose') . ' ' . lang('app.jamia') ?></option>
                                    <?php foreach ($uni as $key => $data) : ?>
                                        <option value="<?= $data['uni_id'] ?>"><?= $data['uni_name'] ?> - (<?= $data['uni_reg'] ?>)</option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-university"></i>
                                </div>
                                <!-- <span class="badge badge-danger" id="mushrif"> <?= lang('app.noMushrif') ?></span> -->
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.iqama').' '.$validation->getError('iqama') ?><?= $errors = $validation->getError('iqama') ?></label>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="iqama" placeholder="<?= lang('app.iqama') ?>" value="<?= old('iqama') ?>">
                                <div class="form-control-position">
                                    <i class="la la-credit-card"></i>
                                </div>
                                <?php if ($validation->getError('iqama')) : ?>
                                    <span class="badge badge-danger"> <?= $errors = $validation->getError('iqama') ?></span>
                                <?php endif ?>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.namereg') . ' - (' . lang('app.arabic') ?>)</label>
                            <?php if ($validation->getError('name')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('name') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="name" placeholder="<?= lang('app.name') . ' - (' . lang('app.arabic') ?>)" value="<?= old('name') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.malaf') ?></label>
                            <?php if ($validation->getError('malaf')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('malaf') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="malaf" placeholder="<?= lang('app.malaf') ?>" value="<?= old('malaf') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.bitaqa') ?></label>
                            <?php if ($validation->getError('bitaqa')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('bitaqa') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="bitaqa" placeholder="<?= lang('app.bitaqa') ?>" value="<?= old('bitaqa') ?>">
                                <div class="form-control-position">
                                    <i class="la la-credit-card"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.phone') ?></label>
                            <?php if ($validation->getError('phone')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('phone') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" placeholder="<?= lang('app.phone') ?>" value="<?= old('phone') ?>">
                                    <div class="form-control-position">
                                        <i class="la la-mobile"></i>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon1">966+</span>
                                    </div>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.bank') ?></label>
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
                            <label class="text-bold-600"><?= lang('app.level') ?></label>
                            <?php if ($validation->getError('level')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('level') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select class="select2 form-control" name="level">
                                    <option selected disabled><?= lang('app.choose') . ' ' . lang('app.lvl') ?></option>
                                    <option value="<?= lang('app.lvl1') ?>"><?= lang('app.lvl1') ?></option>
                                    <option value="<?= lang('app.lvl2') ?>"><?= lang('app.lvl2') ?></option>
                                    <option value="<?= lang('app.lvl3') ?>"><?= lang('app.lvl3') ?></option>
                                    <option value="<?= lang('app.lvl4') ?>"><?= lang('app.lvl4') ?></option>
                                    <option value="<?= lang('app.lvl5') ?>"><?= lang('app.lvl5') ?></option>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-area-chart"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative my-2">
                                <input type="checkbox" name="check" class="chk-remember">
                                <label><?= lang('app.accept') . lang('app.terms & services') ?></label>
                                <?php if ($validation->getError('check')) : ?>
                                    <span class="badge badge-danger"> <?= $errors = $validation->getError('check') ?></span>
                                <?php endif ?>
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