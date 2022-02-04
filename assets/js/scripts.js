function deleteData(id) {
  Swal.fire({
    title: "Are you sure that you want to delete this data?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Confirm",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "controller/ck_deleteController.php?id=" + id,
        type: "GET",
        data: {
          delete: 1,
          id,
        },
        success: function (data) {
          alert(data);
        },
      });
    }
  });
}

$("#checkAll").click(function () {
  $("input:checkbox").not(this).prop("checked", this.checked);
});

// $("#print").click(function () {
//   let printCheckBox = [];

//   $(".check:checked").each(function () {
//     printCheckBox.push($(this).val());
//   });

//   if (printCheckBox.length == 0) {
//     Swal.fire({
//       text: "Please select at least one data to print!",
//       icon: "error",
//     });
//   } else {
//     $.ajax({
//       url: "controller/ck_printController.php?id=" + printCheckBox,
//       type: "POST",
//       data: { print: 1, printCheckBox },
//       success: function () {
//         window.open("controller/ck_printController.php");
//       },
//     });
//   }
// });
