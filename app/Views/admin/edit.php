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
                            <h4 class="media-heading"><span class="users-view-name"><?= session('name') ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= lang('app.admin') ?></span></h4>
                            <span><?= lang('app.malaf') ?>:</span>
                            <span class="users-view-id"><?= session('malaf') ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                            <div class="col-12 col-sm-4 p-2">
                            </div>
                        </div>
                        <div class="col-12">
                            <?= form_open('user/edit/' . $user['id']) ?>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><?= lang('app.nationality') ?>:</td>
                                        <td><input type="text" class="form-control" name="nationality" value="<?= $user['country_arName'] ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.malaf') ?>:</td>
                                        <td class="users-view-name"><input type="text" class="form-control" name="malaf" value="<?= sprintf('%04s', ($user['malaf']??'----')) ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.name') ?>:</td>
                                        <td class="users-view-name"><input type="text" class="form-control" name="name" value="<?= $user['name'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.phone') ?>:</td>
                                        <td class="users-view-name">
                                            <div class="input-group">
                                                <input type="text" pattern="[0-9]{9}" title="اترك 0 وادخل 9 أرقام فقط!" class="form-control" name="phone" value="<?= $user['phone'] ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1">966+</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.bank') ?>:</td>
                                        <td class="users-view-name">
                                            <select class="custom-select" name="bank">
                                                <?php foreach ($bank as $key => $data) : ?>
                                                    <option value="<?= $data['bankId'] ?>" <?= $data['bankId']==$user['bank']?'selected':'' ?>><?= $data['bankName'] . '-' . $data['bankShort'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('app.iban') ?>:</td>
                                        <td class="users-view-name">
                                            <div class="input-group">
                                                <input type="text"  class="form-control" name="iban" value="<?= $user['iban'] ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1"><i class="la la-cc-visa"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.edit') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>