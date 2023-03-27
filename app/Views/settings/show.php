<?php 
if (session('role') == 'superuser') {
    $super = 1;
} else {
    $super = null;
}
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3><b><?= $title ?></b>
                        <?php if (session('role') == 'superuser') : ?>
                        <a class="btn btn-danger box-shadow-2 round pull-right" href="<?= base_url('set/delete/'.$set['id']) ?>"><?= lang('app.delete') ?></a>
                        <?php endif ?>
                        </h3>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="col-12">
                                <?php $validation = \Config\Services::validation(); ?>
                                <?= form_open('set/edit/'. $set['id'] ) ?>
                                <div class="row">
                                <div class="col-md-6">
                                    <label class="text-bold-600"><?= lang('app.name') ?></label>
                                    <?php if ($validation->getError('name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="text" class="form-control" name="name" value="<?= $set['name'] ?>" <?= ($super==1?'':'readonly') ?>>
                                        <div class="form-control-position">
                                            <i class="la la-cog spinner"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                    <div class="col-md-6">
                                    <label class="text-bold-600"><?= lang('app.value') ?></label>
                                    <?php if ($validation->getError('value')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('value') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="<?= $set['name']!='tanfidh'?'text':'date' ?>" class="form-control" name="value" value="<?= $set['value'] ?>">
                                        <div class="form-control-position">
                                            <i class="la la-cog spinner"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                    <div class="col-md-6">
                                    <label class="text-bold-600"><?= lang('app.info') ?></label>
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="text" class="form-control" name="info" value="<?= $set['info'] ?>">
                                        <div class="form-control-position">
                                            <i class="la la-chrome spinner"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                    <div class="col-md-6">
                                    <label class="text-bold-600"><?= lang('app.extra') ?></label>
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="text" class="form-control" name="extra" value="<?= $set['extra'] ?>">
                                        <div class="form-control-position">
                                            <i class="la la-chrome spinner"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                </div>
                                    <button type="submit" class="btn btn-lg btn-block btn-secondary my-2"><?= lang('app.send') ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>