$(document).ready(function(){
    console.log('___ CREATE ESTABLECIMIENTO ___')

    //Validation to set default to horario
    if($('#horario').val() == ''){
        $('#horario').val('{"day0": {"state0":"","open0":"","close0":""},"day1": {"state1":"","open1":"","close1":""},"day2": {"state2":"","open2":"","close2":""},"day3": {"state3":"","open3":"","close3":""},"day4": {"state4":"","open4":"","close4":""},"day5": {"state5":"","open5":"","close5":""},"day6": {"state6":"","open6":"","close6":""}}')
    }else{
        data_time=JSON.parse($('#horario').val());
        helper_set_values_days(0, data_time.day0.state0, data_time.day0.open0, data_time.day0.close0);
        helper_set_values_days(1, data_time.day1.state1, data_time.day1.open1, data_time.day1.close1);
        helper_set_values_days(2, data_time.day2.state2, data_time.day2.open2, data_time.day2.close2);
        helper_set_values_days(3, data_time.day3.state3, data_time.day3.open3, data_time.day3.close3);
        helper_set_values_days(4, data_time.day4.state4, data_time.day4.open4, data_time.day4.close4);
        helper_set_values_days(5, data_time.day5.state5, data_time.day5.open5, data_time.day5.close5);
        helper_set_values_days(6, data_time.day6.state6, data_time.day6.open6, data_time.day6.close6);
    }

    function helper_set_values_days(numberDay, stateValue, openValue, closeValue){
        if(stateValue == '1'){
            $('#day'+numberDay).prop( "checked", true );
            $('#open'+numberDay).removeAttr('disabled');
            $('#close'+numberDay).removeAttr('disabled');
        }
        $('#open'+numberDay).val(openValue);
        $('#close'+numberDay).val(closeValue);
    }

    //set a listener to checkbox component
    $(".check").click(function(){
        value_id=$(this).attr("id").substring(3);
        if( $(this).is(':checked') ) {
            $('#open'+value_id).removeAttr('disabled');
            $('#close'+value_id).removeAttr('disabled');
        }else{
            $('#open'+value_id).attr('disabled', 'disabled');
            $('#close'+value_id).attr('disabled', 'disabled');
        }
	});

    //set a listener to update the times
    $(".update-time").on('change',function(){
        value_id=$(this).attr("id");
        data_time=JSON.parse($('#horario').val());

        switch (value_id) {
            case "day0":
                data_time.day0.state0 = helper_day_state(value_id);
                break;

            case "day1":
                data_time.day1.state1 = helper_day_state(value_id);
                break;

            case "day2":
                data_time.day2.state2 = helper_day_state(value_id);
                break;
                
            case "day3":
                data_time.day3.state3 = helper_day_state(value_id);
                break;

            case "day4":
                data_time.day4.state4 = helper_day_state(value_id);
                break;

            case "day5":
                data_time.day5.state5 = helper_day_state(value_id);
                break;

            case "day6":
                data_time.day6.state6 = helper_day_state(value_id);
                break;
                
            case "open0":
                data_time.day0.open0=$('#'+value_id).val();
                break;

            case "close0":
                data_time.day0.close0=$('#'+value_id).val();
                break;

            case "open1":
                data_time.day1.open1=$('#'+value_id).val();
                break;

            case "close1":
                data_time.day1.close1=$('#'+value_id).val();
                break;
                
            case "open2":
                data_time.day2.open2=$('#'+value_id).val();
                break;

            case "close2":
                data_time.day2.close2=$('#'+value_id).val();
                break;

            case "open3":
                data_time.day3.open3=$('#'+value_id).val();
                break;

            case "close3":
                data_time.day3.close3=$('#'+value_id).val();
                break;
                
            case "open4":
                data_time.day4.open4=$('#'+value_id).val();
                break;

            case "close4":
                data_time.day4.close4=$('#'+value_id).val();
                break;

            case "open5":
                data_time.day5.open5=$('#'+value_id).val();
                break;

            case "close5":
                data_time.day5.close5=$('#'+value_id).val();
                break;

            case "open6":
                data_time.day6.open6=$('#'+value_id).val();
                break;
                
            case "close6":
                data_time.day6.close6=$('#'+value_id).val();
                break;

            default:
                break;
        }
        $('#horario').val(JSON.stringify(data_time))
	});

    function helper_day_state(e){
        if( $('#'+e).is(':checked') ) {
            return '1';
        }else{
            return '0';
        }
    }

});