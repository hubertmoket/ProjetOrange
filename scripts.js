// Boosted core JavaScript
//================================================== -->
//<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/boosted.bundle.js"></script>
<script src="js/boosted.bundle.min.js"></script>
//<!-- Include all compiled plugins bootstrap, bootstrap accessibility plugin and boosted specific components (below), or include individual files as needed -->
<script src="js/boosted.js"></script>

<script>
$(document).ready(function () {
    $("#myTable").tablesorter({
    sortList: [[1, 1]],
    headers: {
        // assign the secound column (we start counting zero)
        0: {
        // disable it by setting the property sorter to false
        sorter: false
        }
    }
    });
});
</script>

<script>
// Surcharge des valeurs du script de la toolbar
accessibilitytoolbar_custom = {
    idLinkModeContainer: "id-for-cdu-link",
    cssLinkModeClassName: "nav-item-cdu",
    idSkipLinkIdLinkMode: "cdu-skiplink",
    cssSkipLinkClassName: "skiplinks-trigger",
    callback: skiplinksAfterLoad
};

$(".skiplinks-trigger").focus(function () {
    $(".skiplinks-section").addClass("skiplinks-show").removeClass("sr-only")
});
$(".skiplinks-trigger").blur(function () {
    $(".skiplinks-section").removeClass("skiplinks-show").addClass("sr-only")
});

function skiplinksAfterLoad() {
    $(".skiplinks-trigger").focus(function () {
    $(".skiplinks-section").addClass("skiplinks-show").removeClass("sr-only")
    });
    $(".skiplinks-trigger").blur(function () {
    $(".skiplinks-section").removeClass("skiplinks-show").addClass("sr-only")
    });
}
</script>
//<!-- <script type="text/javascript" src="http://confort-plus.orange.com/js/toolbar-min.js"></script> -->