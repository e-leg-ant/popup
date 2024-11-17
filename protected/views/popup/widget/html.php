<div class="wrap-popup-<?= $model->getKey(); ?>" id="<?= $model->getKey(); ?>" style="display: none;">

    <div class="popup-body">

        <div class="popup-header">
            <?= $model->name; ?>
        </div>

        <div class="popup-content">
            <?= $model->content; ?>
        </div>

        <div class="popup-footer">
            <a href="javascript:window.popUpWidgetHide_<?= $model->getKey(); ?>()" class="popup-btn">Закрыть попап</a>
        </div>

    </div>


</div>