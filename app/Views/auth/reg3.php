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
                                    <img src="https://ui-avatars.com/api/?background=random&&name=3&&rounded=true" alt="logo" height="120px">
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.signup') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('register') ?>
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
                                <label><?= lang('app.accept') ?> <a href="#" target="_blank"><?= lang('app.terms & services') ?></a></label>
                                <?php if ($validation->getError('check')) : ?>
                                    <span class="badge badge-danger"> <?= $errors = $validation->getError('check') ?></span>
                                <?php endif ?>
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
                            <fieldset>
                                <input type="text" class="form-control mb-1" value="<?= $bank['bankName'].' - '.$iban ?>" readonly>
                                <input type="hidden" name="bank" value="<?=  $bank['bankId'] ?>">
                                <input type="hidden" name="iban" value="<?=  $iban ?>">
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