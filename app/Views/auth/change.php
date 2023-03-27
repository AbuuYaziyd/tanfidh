<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="logo" height="120px">
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.passchange') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('change/password/' . session('id')) ?>
                            <?php if (!$old) : ?>
                                <label class="text-bold-600"><?= lang('app.oldpassword') ?></label>
                                <?php if ($validation->getError('old')) : ?>
                                    <span class="badge badge-danger"> <?= $errors = $validation->getError('old') ?></span>
                                <?php endif ?>
                                <fieldset class="form-group position-relative has-icon-left mb-1">
                                    <input type="password" class="form-control" name="old" placeholder="<?= lang('app.oldpassword')?>">
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                </fieldset>
                            <?php else : ?>
                                <input type="hidden" name="old" value="<?= $old ?>">
                            <?php endif ?>
                            <label class="text-bold-600"><?= lang('app.newpassword') ?></label>
                            <?php if ($validation->getError('new')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('new') ?></span>
                            <?php endif ?>
                            <?php if ($old) : ?>
                                <span class="badge badge-danger">لا يسمح هذه الأرقام - 1234567890</span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" name="new" id="password" placeholder="<?= lang('app.newpassword') ?>" onkeyup="check();">
                                <div class="form-control-position">
                                    <i class="la la-lock"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.newpasswordrep') ?></label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="confpass" placeholder="<?= lang('app.newpasswordrep') ?>" onkeyup="check();">
                                <div class="form-control-position">
                                    <i class="la la-lock"></i>
                                </div>
                            </fieldset>
                            <button type="submit" id="submit" class="btn btn-primary btn-lg glow position-relative w-100" disabled><?= lang('app.passchange') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confpass').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    }
</script>

<?= $this->endSection() ?>