(function($){
    "use strict";
    var HT = {};

    HT.province = () => {
        $(document).on('change','.province',function (){
            let _this = $(this);
            let province_id = _this.val();
            // console.log(province_id);

            $.ajax({
                url:'http://localhost/example-app/public/ajax/location/getLocation',
                type: 'GET',
                data:{
                    province_id: province_id
                },
                dataType: 'JSON',
                success:function (response){
                    $('.districts').html(response.district)
                },
                error:function (jqXHR,textStatus,errorThrown){
                    console.log('jqXHR is : ' + jqXHR
                        + 'textStatus is : ' + textStatus
                        + ' errorThrown is : ' + errorThrown
                        + province_id
                    );
                }
            })
        })
    }
    $(document).ready(function (){
        HT.province();
        // console.log(123)
    });
})(jQuery)
