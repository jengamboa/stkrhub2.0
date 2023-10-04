<?php
echo '
$(document).on("click", "#ajax-link", function(event) {
    event.preventDefault();

    var published_game_id = $(this).data("published-game-id");

    $.ajax({
        url: "process_add_published_game_to_cart.php?published_game_id=" + published_game_id,
        type: "GET",
        success: function(data) {
            $(".cart-count").html(data);
            $("#cartCount").DataTable().ajax.reload();
        },
    });
});

var user_id = ' . $user_id . ';
$("#cartCount").DataTable({
    searching: false,
    info: false,
    paging: false,
    ordering: false,
    ajax: {
        url: "json_cart_count.php",
        data: {
            user_id: user_id,
        },
        dataSrc: "",
    },
    columns: [{
        data: "cart_count",
    }],
});
';
?>
