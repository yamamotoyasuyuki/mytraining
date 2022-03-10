'use strict';

$(document).on("click", ".add", function() {
    $(this).parent().clone(true).insertAfter($(this).parent());
});
$(document).on("click", ".del", function() {
    var target = $(this).parent();
    if (target.parent().children().length > 1) {
        target.remove();
    }
});

$(document).on("click", ".addbtn", function() {
    $(".pulldown").parent().clone(true).insertBefore($(this).parent());
});
$(document).on("click", ".dele", function() {
    var targets = $(".pulldown").parent();
    if (targets.parent().children().length > 1) {
        targets.remove();
    }
});