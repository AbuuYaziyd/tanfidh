<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <?php if ($user['imgIqama'] != null) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid px-1 mt-1" src="<?= base_url('app-assets/images/malaf/'.$user['malaf'].'/'.$user['imgIqama']) ?>" alt="img">
                                    <div class="card-body" style="text-align: center;">
                                        <h3><b><?= lang('app.iqama') ?></b></h3>
                                        <h3 class="btn btn-black round mb-1"><?= $user['iqama'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($user['imgStu'] != null) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid px-1 mt-1" src="<?= base_url('app-assets/images/malaf/'.$user['malaf'].'/'.$user['imgStu']) ?>" alt="img">
                                    <div class="card-body" style="text-align: center;">
                                        <h3><b><?= lang('app.bitaqa') ?></b></h3>
                                        <h3 class="btn btn-black round mb-1"><?= $user['bitaqa'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($user['imgIban'] != null) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid px-1 mt-1" src="<?= base_url('app-assets/images/malaf/'.$user['malaf'].'/'.$user['imgIban']) ?>" alt="img">
                                    <div class="card-body" style="text-align: center;">
                                        <h3><b><?= lang('app.iban') ?></b></h3>
                                        <span class="btn btn-black round mb-1">
                                            <?php $n = str_split($user['iban'], strlen($user['iban'])/6) ?>
                                            <?php foreach ($n as $key => $d) {
                                                echo $d.' ';
                                            } ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="row">
                    <?php if ($user['tasrih']!=null && $user['tnfdhDate']>=date('Y-m-d')) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <div style="text-align: center;">
                                        <h3 class="m-1"><b><?= $user['name'] ?></b></h3>
                                    </div>
                                    <img class="card-img-top img-fluid px-1" src="<?= base_url($user['tasrih']) ?>" alt="img">
                                    <div class="card-body" style="text-align: center;">
                                        <h3 class="mb-1"><b><?= $user['malaf'] ?></b></h3>
                                        <h3 class="mb-1"><b><?= date('d/m/Y', strtotime($user['tnfdhDate'])) ?></b></h3>
                                        <a href="<?= base_url('mushrif/send-tasrih/'.$user['tnfdhId']) ?>" class="btn btn-success round mb-1"><?= lang('app.send') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3>معلومات صاحب التنفيذ</h3>
                            </div>
                            <div class="card-body">
                                <?= form_open('tanfidh/edit/'.$user['tnfdhId']) ?>
                                <label><b>السبب</b></label>
                                <fieldset>
                                    <select name="sabab" class="custom-select mb-2">
                                        <option selected disabled><?= lang('app.choose') ?></option>
                                        <option value="dead"><?= lang('app.dead') ?></option>
                                        <option value="sick"><?= lang('app.sick') ?></option>
                                    </select>
                                </fieldset>
                                    <label><b><?= lang('app.name') ?></b></label>
                                <fieldset class="form-group position-relative has-icon-left mb-1">
                                    <input type="text" class="form-control" name="ism" placeholder="<?= lang('app.name') ?>">
                                    <div class="form-control-position">
                                        <i class="la la-user"></i>
                                    </div>
                                </fieldset>
                                <input type="hidden" name="userId" value="<?= $user['userId'] ?>">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><?= lang('app.send') ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?= $this->endsection() ?>