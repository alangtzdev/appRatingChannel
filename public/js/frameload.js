$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });

  $("#modalAlert").modal("show");
});

function limpiarCampos() {
  $("input").each(function(i) {
    $(this).removeClass("edited");
    $(this).val("");
  });
}
