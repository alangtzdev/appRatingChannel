function getUsers(fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/users",
      "type": "POST",
      "datatype":"json",
      contentType: "application/json; charset=utf-8",
      beforeSend: fnBeforeSend,
      success: fnSuccess,
      error: fnError
   }); 
};

function getRoles(fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/roles",
      "type": "POST",
      "datatype":"json",
      contentType: "application/json; charset=utf-8",
      beforeSend: fnBeforeSend,
      success: fnSuccess,
      error: fnError
   }); 
};

function getPrograms(fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/programs",
      "type": "POST",
      "datatype":"json",
      contentType: "application/json; charset=utf-8",
      beforeSend: fnBeforeSend,
      success: fnSuccess,
      error: fnError
   }); 
};