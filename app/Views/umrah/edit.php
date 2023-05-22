<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="row">
            <section class="users-view col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <?= form_open_multipart('umrah/upload/' . $umrah['tnfdhId']) ?>
                <div class="card col-md-12">
                    <div class="card-header">
                        <h3><?= lang('app.signup') ?> <?= lang('app.donefor') ?> - <?= date('d/m/Y', strtotime($umrah['tnfdhDate'])) ?></h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title"><?= lang('app.register') . ' ' . lang('app.to') . ' ' . lang('app.tanfidh') . '  ' . lang('app.umrah') ?><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= sprintf('%04s',session('malaf')) ?></span></h4>
                            <span class="bagde badge-danger badge-pill mb-2"><?= lang('app.imgErr') ?></span>
                            <div class="row mt-1">
                                <!-- <input type="file" name="pic1" id="pic1" style="display:none;"/>
                                <label for="pic1">
                                    <img src="dist/img/picfilename.png">
                                </label> -->
                                <div class="col-12 mb-1">
                                    <input type="file" name="img" id="image" style="display: none;">
                                    <label for="image">
                                        <img class="img-fluid mb-2" id="show_image" src="<?= base_url($umrah['tasrih']?? 'app-assets/images/demo/no-image.png') ?>" alt="img">
                                    </label>
                                    <fieldset class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"><?= lang('app.donefor') ?></label>
                                            </div>
                                            <input type="date" class="form-control" value="<?= date('Y-m-d', strtotime($umrah['tnfdhDate'])) ?>" readonly>
                                        </div>
                                        <?php if ($validation->getError('select')) : ?>
                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('select') ?></span>
                                        <?php endif ?>
                                    </fieldset>
                                    <?php if ($validation->getError('img')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('img') ?></span>
                                    <?php endif ?>
                                    <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2" <?= (date('d/m/Y') != date('d/m/Y') ? 'disabled' : '') ?>><i class="ft ft-check-circle white"></i> <?= lang('app.upload') ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </section>
        </div>
    </div>

<script>
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    (function (window, document, $) {
        'use strict';
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    })(window, document, jQuery);
</script>
<?= $this->endSection() ?>