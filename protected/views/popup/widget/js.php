(function(){

window.popUpWidgetInit<?= $model->getKey(); ?> = function () {

    let html = '<?= $html; ?>';

    $(html).appendTo('body');

    let css = '<?= $css; ?>';

    $(css).appendTo('body');

    window.popUpWidgetShow_<?= $model->getKey(); ?> = function () {
        $('.wrap-popup-<?= $model->getKey(); ?>').fadeIn("slow");
    }

    window.popUpWidgetHide_<?= $model->getKey(); ?> = function () {
        $('.wrap-popup-<?= $model->getKey(); ?>').fadeOut("slow");
    }

    let timerId = setTimeout(() => {

        window.popUpWidgetShow_<?= $model->getKey(); ?>();

        let script = document.createElement('script');
        script.src = '<?= Yii::app()->createAbsoluteUrl('popup/seen', array('id' => $model->id)); ?>';
        document.body.append(script);

    }, 10000);

}

window.onload = function() {

    if (window.jQuery) {

        window.popUpWidgetInit<?= $model->getKey(); ?>();

    } else {

        const script = document.createElement("script");
        script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js';
        script.type = 'text/javascript';
        script.addEventListener('load', () => {
            window.popUpWidgetInit<?= $model->getKey(); ?>();
        });

        document.head.appendChild(script);

    }
};


})();