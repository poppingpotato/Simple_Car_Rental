$(document).ready(function () {
    var minDate = new Date();
    $("#fromDate").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        dateFormat: 'yy/mm/dd', 
        onClose: function (selectedDate) {
            $('#toDate').datepicker("option", "minDate", selectedDate);

        }
    });

    $("#toDate").datepicker({
        showAnim: 'drop',
        numberOfMonth:1,
        minDate: minDate,
        dateFormat: 'yy/mm/dd',
        onClose: function (selectedDate){
            $('#toDate').datepicker("option", "minDate", selectedDate);

        }
    });
});