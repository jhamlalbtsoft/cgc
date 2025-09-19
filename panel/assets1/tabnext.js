
function getCurDate(){
  var currentdate = new Date(); 
      var datetime = ("0" + currentdate.getDate()).slice(-2) + "-"
      + ("0" + (currentdate.getMonth() + 1)).slice(-2)  + "-" 
      + currentdate.getFullYear();
      return datetime;
}

function getCurTime()
{
    var dt = new Date();
    var time = '';
    if (dt.getHours()<10) 
    {
        var time = ("0" + dt.getHours()) + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    }
    else if (dt.getMinutes()<10) 
    {
        var time =  dt.getHours() + ":" + ("0" + dt.getMinutes() ) + ":" + dt.getSeconds();
    }
    else if(dt.getHours()<10 && dt.getMinutes()<10)
    {
        var time = ("0" + dt.getHours()) + ":" + ("0" + dt.getMinutes()) + ":" + dt.getSeconds();
    }
    else
    {
        var time =  dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    }
    
    return time;
}

    function MoveTextBox(ids) {

        $(ids).find("input,select").each(function () {
                var num_type = $(this).attr("text-type");
        //        TextFormat(num_type, $(this).attr('id'));
                $(this).on("keydown", function (event) {
                    var tabindex = $(this).attr('tabindex');
                    if (event.which == 13) {
                        tabindex++;
                        $('[tabindex=' + tabindex + ']').focus();
                        event.preventDefault();
                        return false;
                    }
                    var autocomplete = $(this).attr("list");
                    if (!($(this).is("select")) && (autocomplete == "" || autocomplete == null || autocomplete == undefined)) {
                        if (event.which == 38) {
                            tabindex--;
                            //alert(tabindex);
                        }
                        else if (event.which == 40) {
                            tabindex++;
                        }
                        $('[tabindex=' + tabindex + ']').focus();
                    }
                });

        }

        );

        $("[tabindex='1']").focus();

    }