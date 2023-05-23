<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="text-align: center;">
                                    <h3><b><i class="flag-icon flag-icon-<?= strtolower($user['nationality']) ?>"></i> -  <?= $loc ?></b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if ($user['imgIqama'] != null) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid px-1 mt-1" src="<?= base_url('app-assets/images/malaf/'.$user['malaf']??'new'.'/'.$user['imgIqama']) ?>" alt="img">
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
                                        <button class="btn btn-black round mb-1" onclick="myFunction()">
                                            <?php $n = str_split($user['iban'], strlen($user['iban'])/6) ?>
                                            <?php foreach ($n as $key => $d) {
                                                echo $d.' ';
                                            } ?>
                                        </button>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?= form_open('admin/mulahadha/'.$user['tnfdhId']) ?>
                                <h4 class="text-bold-600"><?= lang('app.mulahadha') ?></h4>
                                <fieldset class="form-group position-relative has-icon-left mb-1">
                                    <textarea name="mulahadha" class="form-control" cols="30" rows="3" placeholder="<?= lang('app.mulahadha') ?>"><?= $user['mulahadha']??'' ?></textarea>
                                    <div class="form-control-position">
                                        <i class="la la-edit"></i>
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