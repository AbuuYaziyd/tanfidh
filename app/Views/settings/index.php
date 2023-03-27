<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <a id="count" data-toggle="modal" data-target="#whatsapp">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted"><b><?= lang('app.whatsapp') ?></b></h6>
                                                <h3><?= lang('app.mushrifuna') ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="la la-whatsapp success font-large-3 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a id="count" data-toggle="modal" data-target="#default">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted"><b><?= lang('app.studentCount') ?></b></h6>
                                                <h3><?= $count['value'] ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="la la-users info font-large-3 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a id="count" data-toggle="modal" data-target="#tasrih">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted"><b><?= lang('app.tasrihDate') ?></b></h6>
                                                <h3 class="<?= $extra<date('Y-m-d')?'danger':'success' ?>"><?= date('d/m/Y', strtotime($extra)) ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="la la-calendar<?= $extra<date('Y-m-d')?'-times-o danger':' success' ?> font-large-3 float-right <?= $extra<date('Y-m-d')?'danger':'success' ?>"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a id="count" data-toggle="modal" data-target="#umra">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted"><b><?= lang('app.umraCount') ?></b></h6>
                                                <h3><?= $umra['value'] ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-pointer info font-large-3 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($tasrih as $key => $dt) : ?>
                    <div class="col-md-3">
                        <a id="count" data-toggle="modal" data-target="#tanfidh">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted"><b><?= lang('app.tanfidh') ?> - <?= $key+1 ?></b></h6>
                                                <h3 class="<?= $dt['value']<date('Y-m-d')?'danger':'success' ?>"><?= date('d/m/Y', strtotime($dt['value'])) ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="la la-calendar<?= $dt['value']<date('Y-m-d')?'-times-o danger':' success' ?> font-large-3 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">
                            <?= lang('app.edit') ?> <?= lang('app.studentCount') ?>
                            <span class="badge badge badge-info badge-pill float-right mr-2"><?= $count['value'] ?></span>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/student-count') ?>
                            <fieldset>
                                <label><b><?= lang('app.studentCount') ?></b></label>
                                <input type="hidden" name="id" value="<?= $count['id'] ?>">
                                <input type="text" class="form-control" name="stuCount" value="<?= $count['value'] ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="whatsapp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">
                            <?= lang('app.link') ?> <?= lang('app.whatsapp') ?>
                        </h4>
                            <a href="<?= $whats['link'] ?>" class="btn btn-success round pull-right mr-2" target="_blank"><i class="la la-whatsapp"></i> <?= lang('app.whatsapp') ?> - <?= lang('app.mushrifuna') ?></a>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('whatsapp/edit/'.$whats['id']) ?>
                            <fieldset>
                                <label><b><?= lang('app.edit') ?> <?= lang('app.link') ?> <?= lang('app.whatsapp') ?> </b></label>
                                <input type="hidden" name="id" value="<?= $count['id'] ?>">
                                <input type="text" class="form-control" name="link" value="<?= $whats['link'] ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="tanfidh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel2">
                            <?= lang('app.edit') ?> <?= lang('app.tanfidh') ?>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/tanfidh') ?>
                            <?php foreach ($tasrih as $key => $dt) : ?>
                                <fieldset>
                                    <label><b><?= lang('app.tanfidhDate') ?> - <?= $key+1 ?></b></label>
                                    <input type="hidden" name="id[]" value="<?= $dt['id'] ?>">
                                    <input type="date" class="form-control" name="tanfidhDate[]" value="<?= $dt['value'] ?>">
                                </fieldset>
                            <?php endforeach ?>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="tasrih" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel3">
                            <?= lang('app.edit') ?> <?= lang('app.tasrih') ?>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/tasrih') ?>
                            <fieldset>
                                <label><b><?= lang('app.tasrihDate') ?></b></label>
                                <input type="date" class="form-control" name="tasrihDate" value="<?= $extra ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel3">
                            <?= lang('app.tanfidhSettings') ?>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/tanfidh-settings') ?>
                            <fieldset>
                                <label><b><?= lang('app.tasrihDate') ?></b></label>
                                <input type="date" class="form-control" name="tasrihDate" value="<?= $extra ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="umra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">
                            <?= lang('app.edit') ?> <?= lang('app.umraCount') ?>
                            <span class="badge badge badge-info badge-pill float-right mr-2"><?= $umra['value'] ?></span>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/umra-count') ?>
                            <fieldset>
                                <label><b><?= lang('app.umraCount') ?></b></label>
                                <input type="hidden" name="id" value="<?= $umra['id'] ?>">
                                <input type="text" class="form-control" name="umraNo" value="<?= $umra['value'] ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>