<?php

use App\Models\Notify;
use App\Models\User;

$tn = new Notify();
$user = new User(); 

$notf = $tn->where(['userId' => session('id')])->orderBy('id', 'desc')->findAll();
$mush = $tn->where(['mushrif' => session('id')])->orderBy('id', 'desc')->findAll();
?>

<?php if (count($notf) > 0) : ?>
    <?php foreach ($notf as $key => $dt) : ?>
        <div class="alert alert-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong><?= lang('app.notification') ?> - <?= $key+1 ?></strong> <b><?= $dt['description'] ?></b>
            <small class="media-meta text-muted">[<?= date("d/m/Y H:m:s", strtotime($dt['created_at'])) ?>]</small>
        </div>
    <?php endforeach ?>
<?php elseif (count($mush) > 0) : ?>
    <?php foreach ($mush as $key => $dt) : ?>
        <div class="alert alert-warning alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong><?= lang('app.notification') ?> - <?= $key+1 ?></strong> <b><?= $dt['description'] ?></b> لـ 
            <a href="<?= base_url('mushrif/user/'.$dt['userId']) ?>" class="badge badge-pill badge-secondary" target="_blank"><?= $user->find($dt['userId'])['name']; ?></a>
            <small class="media-meta text-muted">[<?= date("d/m/Y H:m:s", strtotime($dt['created_at'])) ?>]</small>
        </div>
    <?php endforeach ?>
<?php endif ?>