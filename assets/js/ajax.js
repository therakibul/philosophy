; (function ($) {
    $(document).ready(function () {
        $("#btn").on("click", function () {
            let info = $("#info").val();
            let nonce = $("#_wpnonce").val();
            $.post(ajax_url.preview, {
                action: "wp_my_ajax",
                message: info,
                n: nonce
            }, function (data) {
                console.log(data);
            });
            return false;
        });
    });
})(jQuery);