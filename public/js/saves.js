function saveImportDatas(importDatas, fnBeforeSend, fnSuccess, fnError) {
  $.ajax({
    url: "/importData",
    type: "POST",
    processData: false,
    contentType: false,
    cache: false,
    enctype: "multipart/form-data",
    data: importDatas,
    beforeSend: fnBeforeSend,
    success: fnSuccess,
    error: fnError
  });
}
