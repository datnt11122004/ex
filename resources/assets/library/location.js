(function($){
    "use strict";
    var HT = {};

    HT.getLocation = () => {
        $(document).on('change','.location',function (){
            let _this = $(this);
            let option = {
                'data' :{
                    'location_id' : _this.val(),
                },
                'target' : _this.attr('data-target')

            }
            HT.sendDataToGetLocation(option);
        })
    }

    HT.sendDataToGetLocation = (option) =>{
        $.ajax({
            url:'http://localhost/example-app/public/ajax/location/getLocation',
            type: 'GET',
            data:option,
            dataType: 'JSON',
            success:function (response){
                $('.'+option.target).html(response.html);


                if(district_id !== '' && option.target === 'districts'){
                    $('.districts').val(district_id).trigger('change');
                }

                if(ward_id !== '' && option.target === 'wards'){
                    $('.wards').val(ward_id).trigger('change');
                }
            },
            error:function (jqXHR,textStatus,errorThrown){
                console.log('jqXHR is : ' + jqXHR
                    + 'textStatus is : ' + textStatus
                    + ' errorThrown is : ' + errorThrown
                );
            }
        })
    }

    HT.loadCity = () => {
        if(province_id !== ''){
            $('.province').val(province_id).trigger('change');
        }

    }
    $(document).ready(function (){
        HT.getLocation();
        HT.loadCity();

        // console.log(123)
    });
})(jQuery)
