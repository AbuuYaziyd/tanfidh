<?= $this->extend('layouts/main') ?>
<?= $this->section('scripts') ?>

<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="content-body">
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                <?= $title ?>
                                <a class="btn btn-outline-success box-shadow-1 round pull-right" href="<?= base_url('admin/add') ?>"><?= lang('app.new') ?></a>
                            </h2>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <label for=""><b>jdfklgnf</b></label>
                                <select name="jamia" class="custom-select">
                                    <option value="dgffg">djksngjngk</option>
                                            <?php foreach ($jamia as $key => $data) : ?>
                                                <option value="<?= $data['jamia']?>"><?= $data['jamia'] ?></option>
                                            <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?= $this->endsection() ?>