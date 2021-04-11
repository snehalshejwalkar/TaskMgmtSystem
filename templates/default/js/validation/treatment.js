
$(document).ready(function(){


    $('.table-hover tr').click(function (event) {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });


    $("input[type='checkbox']").change(function (e) {
        if ($(this).is(":checked")) {
            $(this).closest('tr').addClass("bg-info");
            $.post(SITEROOT+'/Treatment/for_print', { treatment_id:$(this).val(),'operation': 'insert' },function(data){ 

            },'html');
        } else {
            $(this).closest('tr').removeClass("bg-info");
            $.post(SITEROOT+'/Treatment/for_print', { treatment_id:$(this).val(),'operation': 'remove' },function(data){ 

            },'html');
        }
    });


    // $(".cbx").click(function(){
    //     // $(".cbx").each(function(){
    //     //     if($(this).is(":checked"))
    //     //         values.push($(this).val());
    //     // });
            
    //     if($(this).prop("checked") == true){ 
             
    //         $.post(SITEROOT+'/Treatment/for_print', { treatment_id:$(this).val(),'operation': 'insert' },function(data){ 

    //         },'html');
    //     }else {
            
    //         $.post(SITEROOT+'/Treatment/for_print', { treatment_id:$(this).val(),'operation': 'remove' },function(data){ 

    //         },'html');
    //     }
    // });
});    
