$(document).ready(function () {
    var minDate = new Date();
    $("#fromDate").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        dateFormat: 'mm/dd/yy', 
        onClose: function (selectedDate) {
            $('#toDate').datepicker("option", "minDate", selectedDate);

        }
    });

    $("#toDate").datepicker({
        showAnim: 'drop',
        numberOfMonth:1,
        minDate: minDate,
        dateFormat: 'mm/dd/yy',
        onClose: function (selectedDate){
            $('#toDate').datepicker("option", "minDate", selectedDate);

        }
    });
});