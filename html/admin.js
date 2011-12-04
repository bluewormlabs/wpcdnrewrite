jQuery(document).ready(function($){
    //add a new row for the domain whitelist
    $("#addDomain").click(function() {
        var rowCount = $('[id^="domain"]').length;
        var row = $('#domain0').clone();

        //update the attributes of the input in our row
        row.find('input').val('');

        //
        while($('#domain' + rowCount).length) {
            rowCount++;
        }

        //also update the rows id
        row = row.attr('id', 'domain' + rowCount);
        row.insertBefore('#addRow');
    });


});


function removeRow(element) {
    jQuery(element).parent().parent().remove();
}