//if (!Modernizr.inputtypes.date) {
$(".datefield").live("focusin", function () {
    //$(this).datepicker();
    $(this).datepicker({
        changeMonth: true,
        changeYear: true, dateFormat: "dd/mm/yy"
			      
    });
    //$(this).datepicker("option", "dateFormat", "dd/mm/yy");
});
$(".datefield1").live("focusin", function () {
    //$(this).datepicker();//if (!Modernizr.inputtypes.date) {
    $(".datefield").live("focusin", function () {
        //$(this).datepicker();
        $(this).datepicker({
            changeMonth: true,
            changeYear: true, dateFormat: "dd/mm/yy"
        });
        //$(this).datepicker("option", "dateFormat", "dd-mm-yy");
    });
    $(".datefield1").live("focusin", function () {
        //$(this).datepicker();
        $(this).datetimepicker({
            changeMonth: true,
            changeYear: true, dateFormat: "dd/mm/yy"

        });
        //$(this).datepicker("option", "dateFormat", "dd-mm-yy");
    });
    //}
    ////$(function () {
    ////    $(".datefield").datepicker({
    ////        changeMonth: true,
    ////        changeYear: true
    ////    });
    ////});
    ////$("#master").delegate(".datefield", "click", function () {
    ////    $(this).datepicker({
    ////        changeMonth: true,
    ////        changeYear: true
    ////    });
    ////});
 
    $(this).datetimepicker({
        changeMonth: true,
        changeYear: true, dateFormat: "dd/mm/yy"

    });
    //$(this).datepicker("option", "dateFormat", "dd/mm/yy");
});
//}
////$(function () {
////    $(".datefield").datepicker({
////        changeMonth: true,
////        changeYear: true
////    });
////});
////$("#master").delegate(".datefield", "click", function () {
////    $(this).datepicker({
////        changeMonth: true,
////        changeYear: true
////    });
////});
 