<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <?php $errors = validation_errors(); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2><?= lang('app.registerNow') ?>
                                    <a href="<?= base_url('mushrif/add') ?>" class="btn btn-outline-success round pull-left"><?= lang('app.add') ?></a>
                                </h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <?= form_open('mushrif/create') ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-bold-600"><?= lang('app.iqama') ?></label>
                                                <?php if (! empty($errors['iqama'])) : ?>
                                                    <span class="badge badge-danger"><?= ($errors['iqama']) ?></span>
                                                <?php endif ?>
                                                <fieldset class="form-group position-relative has-icon-left mb-1">
                                                    <input type="text" class="form-control" name="iqama" placeholder="<?= lang('app.iqama') ?>" value="<?= old('iqama') ?>">
                                                    <div class="form-control-position">
                                                        <i class="la la-credit-card"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="text-bold-600"><?= lang('app.bitaqa') ?></label>
                                                <?php if (! empty($errors['bitaqa'])) : ?>
                                                    <span class="badge badge-danger"><?= ($errors['bitaqa']) ?></span>
                                                <?php endif ?>
                                                <fieldset class="form-group position-relative has-icon-left mb-1">
                                                    <input type="text" class="form-control" name="bitaqa" placeholder="<?= lang('app.bitaqa') ?>" value="<?= old('bitaqa') ?>">
                                                    <div class="form-control-position">
                                                        <i class="la la-credit-card"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-lg btn-block"><?= lang('app.send') ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?= $this->endSection() ?>