$(document).ready(function(){
    // No intent to create new type?
    if ($('#qtype')[0].selectedIndex != 0) {
        $('#qtype-new').hide();
    }

    $('#qtype').change(function (e) {
        if (this.selectedIndex == 0) {
            $('#qtype-new').show();
        } else {
            $('#qtype-new').hide();
        }
    });
});
