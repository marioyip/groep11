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