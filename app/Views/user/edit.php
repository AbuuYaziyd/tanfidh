<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
    <div class="content-body">
        <section class="users-view">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">
                        <a class="mr-1" href="#">
                            <img src="https://ui-avatars.com/api/?name=<?= session('malaf') ?>&background=random&length=4" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                        </a>
                        <div class="media-body pt-25">
                            <h4 class="media-heading"><span class="users-view-name"><?= session('name') ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= $user['uni_name'] ?></span></h4>
                            <span><?= lang('app.malaf') ?>:</span>
                            <span class="users-view-id"><?= session('malaf') ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                </div>
            </div>
            <?php if ($user['mushrif'] != null) : ?>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                            <div class="col-12 col-sm-4 p-2">
                            </div>
                        </div>
                        <div class="col-12">
                            <?= form_open('user/edit/' . $user['id']) ?>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.nationality') ?>:</b></label>
                                    <fieldset>
                                        <input type="text" class="form-control" name="nationality" value="<?= $user['country_arName'] ?>" readonly>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.jamia') ?>:</b></label>
                                    <fieldset>
                                        <input type="text" class="form-control" name="jamia" value="<?= $user['uni_name'] ?>" readonly>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.iqama') ?>:</b></label>
                                    <fieldset>
                                        <input type="text" class="form-control" name="iqama" value="<?= $user['iqama'] ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.name') ?>:</b></label>
                                    <fieldset>
                                        <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.bitaqa') ?>:</b></label>
                                    <fieldset>
                                        <input type="text" class="form-control" name="bitaqa" value="<?= $user['bitaqa']??'' ?>" placeholder="<?= lang('app.notFound') ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.phone') ?>:</b></label>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="text" pattern="[0-9]{9}" title="اترك 0 وادخل 9 أرقام فقط!" class="form-control" name="phone" value="<?= $user['phone'] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">966+</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.bank') ?>:</b></label>
                                    <fieldset>
                                        <select class="custom-select" name="bank">
                                            <?php foreach ($bank as $key => $data) : ?>
                                                <option value="<?= $data['bankId'] ?>" <?= $data['bankId']==$user['bank']?'selected':'' ?>><?= $data['bankName'] . '-' . $data['bankShort'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.iban') ?>:</b></label>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="text"  class="form-control" name="iban" value="<?= $user['iban'] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1"><i class="la la-cc-visa"></i></span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.edit') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                            <div class="col-12 col-sm-4 p-2">
                            </div>
                        </div>
                        <div class="col-12">
                            <?= form_open('user/edit-mushrif/' . $user['id']) ?>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.nationality') ?>:</b></label>
                                    <fieldset>
                                        <select name="nationality" class="custom-select">
                                            <?php foreach ($nat as $key => $data) : ?>
                                                <option value="<?= $data['country_code'] ?>" 
                                                <?= $user['nationality'] == $data['country_code']?'selected':'' ?>><?= $data['country_arName'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label><b><?= lang('app.jamia') ?>:</b></label>
                                    <fieldset>
                                        <input type="text" class="form-control" name="jamia" value="<?= $user['uni_name'] ?>" readonly>
                                        <input type="hidden" class="form-control" name="jamia" value="<?= $user['uni_id'] ?>" readonly>
                                    </fieldset>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.edit') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </section>
    </div>
<?= $this->endSection() ?>