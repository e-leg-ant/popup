<style>

    .wrap-popup-<?= $model->getKey(); ?> {
        width: 100%;
        min-height: 100%;
        background-color: rgba(0,0,0,0.5);
        overflow: hidden;
        position: fixed;
        top: 0px;
    }

    .wrap-popup-<?= $model->getKey(); ?> .popup-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 40px auto 0px auto;
        width: 300px;
        min-height: 200px;
        background-color: #c5c5c5;
        border-radius: 5px;
        box-shadow: 0px 0px 10px #000;
    }

    .wrap-popup-<?= $model->getKey(); ?> .popup-content {
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        width: 100%;
        min-height: 200px;
        background-color: #000000;
        color: #ffffff;
        font-size: 16px;
        padding: 10px 10px;
    }

    .wrap-popup-<?= $model->getKey(); ?> .popup-footer {
        display: flex;
        justify-content: center;
        width: 100%;
        padding: 10px;
        background-color: #c5c5c5;
    }

    .wrap-popup-<?= $model->getKey(); ?> .popup-btn {
        color: #ffffff;
        background-color: #5aa84c;
        padding: 10px;
        text-decoration: none;
    }

</style>