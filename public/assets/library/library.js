(function($){
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');

    HT.switchery = () => {
        $('.js-switch').each(function (){
            var switchery = new Switchery(this, { color: '#1AB394' });
        })
    }

    HT.changeStatus = () => {
        $(document).on('change', '.status', function(e){
            let _this = $(this)
            let option = {
                'value' : _this.val(),
                'modelId' : _this.attr('data-modelId'),
                'model' : _this.attr('data-model'),
                'field' : _this.attr('data-field'),
                '_token' : _token
            }

            $.ajax({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    let inputValue = ((option.value == 1)?0:1)
                    if(res.flag == true){
                        _this.val(inputValue);
                        // alert('Cập nhật thành công')
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {

                    console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
                }
            });

            e.preventDefault()
        })
    }

    $(document).ready(function (){
        HT.switchery();
        HT.changeStatus();
        // console.log(123)
    });
})(jQuery)
