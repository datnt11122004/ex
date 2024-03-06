(function($){
    "use strict";
    var HT = {};

    HT.switchery = () => {
        $('.js-switch').each(function (){
            var switchery = new Switchery(this, { color: '#1AB394' });
        })
    }

    $(document).ready(function (){
        HT.switchery();
        // console.log(123)
    });
})(jQuery)
