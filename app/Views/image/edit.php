<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <section class="users-view">
            <?php $validation = \Config\Services::validation(); ?>
            <?= form_open_multipart('image/edit/' . session('id')) ?>
            <div class="card col-md-6">
                <div class="card-header">
                    <h4 class="media-heading"><span class="users-view-name"><?= lang('app.edit') . ' ' . lang('app.'.$type) ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= session('malaf') ?></span></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-1">
                                <?php if ($type == 'imgIqama') : ?>
                                    <fieldset class="mb-1 text-center">
                                        <h5><b><?= lang('app.iqama') ?>: <?= $user['iqama'] ?></b></h5>
                                    </fieldset>
                                <?php elseif ($type == 'imgStu') : ?>
                                    <fieldset class="mb-1 text-center">
                                        <h5><b><?= lang('app.bitaqa') ?>: <?= $user['bitaqa'] ?></b></h5>
                                    </fieldset>
                                <?php elseif ($type == 'imgIban') : ?>
                                    <fieldset class="mb-1 text-center">
                                        <h5><b><?= lang('app.iban') ?>: <?= $user['iban'] ?></b></h5>
                                    </fieldset>
                                <?php endif ?>
                            <img class="img-fluid mb-2" id="show_image" src="<?= base_url('app-assets/images/' . ($img[$type] == null ? 'demo/no-image.png' : 'malaf/'.(session('malaf')=='----'?'new':session('malaf')).'/') . $img[$type]) ?>" alt="img">
                                    <p><span class="badge badge-danger bdage-pill"><?= lang('app.imgErr') ?></span></p>
                                    <?php if ($validation->getError('img')) : ?>
                                        <span class="badge badge-danger mb-1"> <?= $errors = $validation->getError('img') ?></span>
                                    <?php endif ?>
                                <div class="input-group mt-0">
                                    <div class="custom-file">
                                        <input type="file" name="img" id="image" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label"><?= lang('app.chooseFile') ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="select" value="<?= $type ?>">
                        <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.upload') ?></button>
                    </div>
                </div>
            </div>
            </form>
        </section>
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
</script>
<script>
    (function (window, document, $) {
        'use strict';
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    })(window, document, jQuery);
</script>
<?= $this->endSection() ?>