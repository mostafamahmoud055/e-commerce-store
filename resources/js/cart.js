// console.log($('.shopping-list'));
$(".item-quantity").on("change", function () {
    $.ajax({
        url: "/cart/" + $(this).data("id"),
        method: "put",
        data: {
            quantity: $(this).val(),
            _token: csrf_token,
        },
        success: (data) => {
            $("#total").text("$" + data["total"]);
        },
    });
});
// $(".remove-item").on("click", function () {
//     console.log(this);
//     $(this).each(function (item) {
//         let id = $(this).data("id");
//         $.ajax({
//             url: "/cart/" + id,
//             method: "delete",
//             data: {
//                 _token: csrf_token,
//             },
//             success: () => {
//                 $(`#${id}`).remove();
//             },
//         });
//     });
// });
