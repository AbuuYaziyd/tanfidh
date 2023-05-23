<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0 mb-2">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="logo" height="120px">
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.recoverpassword') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?= form_open('recover') ?>
                            <label class="text-bold-600"><?= lang('app.malaf') ?></label>
                            <?php if ((session()->getFlashdata('malaf'))) : ?>
                                <span class="badge badge-danger"><?= (session()->getFlashdata('malaf')) ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="malaf" placeholder="<?= lang('app.malaf') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.iqama') ?></label>
                            <?php if ((session()->getFlashdata('iqama'))) : ?>
                                <span class="badge badge-danger"><?= (session()->getFlashdata('iqama')) ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" name="iqama" placeholder="<?= lang('app.iqama') ?>">
                                <div class="form-control-position">
                                    <i class="la la-credit-card"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.phone') ?></label>
                            <?php if ((session()->getFlashdata('phone'))) : ?>
                                <span class="badge badge-danger"><?= (session()->getFlashdata('phone')) ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" placeholder="<?= lang('app.phone') ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon1">966+</span>
                                    </div>
                                </div>
                                <div class="form-control-position">
                                    <i class="la la-mobile"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> <?= lang('app.newpassword') ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center"><?= lang('app.rememberedmypass') ?><a href="<?= base_url('login') ?>"> <?= lang('app.login') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>