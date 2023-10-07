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




//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
';
