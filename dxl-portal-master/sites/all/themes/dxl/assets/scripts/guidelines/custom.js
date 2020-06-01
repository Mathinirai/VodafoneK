$(document).ready(function () {

    //Clipboard
    var clipboard = new ClipboardJS('.copy-code--btn');

    clipboard.on('success', function (e) {
        var btn = $(e.trigger);
        e.clearSelection();
    });
    clipboard.on('error', function (e) {
        console.log(e);
    });



    addEventListener('load', function (event) { PR.prettyPrint(); }, false);
});