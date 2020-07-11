
$(document).ready(function(){
    $("#profile-cellphone").blur(function(){
        var x=1;
        var field= $("#profile-cellphone").val();
        if(isNaN(field) || field.indexOf(" ") != -1){
            $('#result_mob').html("تلفن همراه باید به شکل عدد وارد شود");
            x=0;
        }



        if((field.charAt(0)+field.charAt(1)) != "09"){
            $('#result_mob').html("تلفن همراه باید با 09 شروع شود");
            x=0;
        }


        if (field.length < 11)
        {
            $('#result_mob').html("تعداد ارقام نمیتواند کمتر از 11 رقم باشد ");
            x=0;
        }


        if(x==0){
            $('#result_mob').css('display','block')
        }else{
            $('#result_mob').css('display','none')
        }
    });

    $("#signupform-cellphone1").blur(function(){
        var x=1;
        var field= $("#signupform-cellphone1").val();
        if(isNaN(field) || field.indexOf(" ") != -1){
            $('#result_mob').html("تلفن همراه باید به شکل عدد وارد شود");
            x=0;
        }



        if((field.charAt(0)+field.charAt(1)) != "09"){
            $('#result_mob').html("تلفن همراه باید با 09 شروع شود");
            x=0;
        }


        if (field.length < 11)
        {
            $('#result_mob').html("تعداد ارقام نمیتواند کمتر از 11 رقم باشد ");
            x=0;
        }


        if(x==0){
            $('#result_mob').css('display','block')
        }else{
            $('#result_mob').css('display','none')
        }
    });
    
    
    
    
});/**
 * Created by xfx on 4/21/2018.
 * کد های مربوط به ولیدت کردن موبایل که با کد های جیکوئری نوشته شده

 */


/**
 * Created by hadise on 4/22/2018.
 */
