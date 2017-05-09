/**
 * Created by Mario on 8-5-2017.
 */

$(".headerRubriek").click(function () {

    $headerRubriek = $(this);
    //getting the next element
    $content = $headerRubriek.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header.text(function () {
            //change text based on condition
            return $content.is(":visible") ? "Collapse" : "Expand";
        });
    });

});


var searchRequest = null;

$(function () {
    var minlength = 3;

    $("#sample_search").keyup(function () {
        var that = this,
            value = $(this).val();

        if (value.length >= minlength ) {
            if (searchRequest != null)
                searchRequest.abort();
            searchRequest = $.ajax({
                type: "GET",
                url: "sample.php",
                data: {
                    'search_keyword' : value
                },
                dataType: "text",
                success: function(msg){
                    //we need to check if the value is the same
                    if (value==$(that).val()) {
                        //Receiving the result of search here
                    }
                }
            });
        }
    });
});