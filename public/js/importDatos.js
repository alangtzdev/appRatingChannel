$(function() {
  $("#btnImportDatos").click(function() {
    let importDatas = new FormData();
    importDatas.append("fileTransmition", $("#fileTransmition")[0].files[0]);

    SaveImportDatas(importDatas);
  });
});

function SaveImportDatas(importDatas) {
  let fnBeforeSend = () => {
    swal.showLoading();
  };

  let fnSuccess = () => {
    swal.hideLoading();
    swal(
      "¡Excelente!",
      "Tus datos fueron importados correctamente.",
      "success"
    );
  };

  let fnError = () => {
    swal.hideLoading();
    swal("¡Algo salio mal!", "Tus datos no fueron importados.", "error");
  };

  saveImportDatas(importDatas, fnBeforeSend, fnSuccess, fnError);
}
