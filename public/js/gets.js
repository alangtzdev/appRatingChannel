function getUsers(fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/users",
      "type": "POST",
      "datatype":"json",
      "contentType": "application/json; charset=utf-8",
      "beforeSend": fnBeforeSend,
      "success": fnSuccess,
      "error": fnError
   }); 
};

function getRoles(fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/roles",
      "type": "POST",
      "datatype":"json",
      "contentType": "application/json; charset=utf-8",
      "beforeSend": fnBeforeSend,
      "success": fnSuccess,
      "error": fnError
   }); 
};

function getPrograms(fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/programs",
      "type": "POST",
      "datatype":"json",
      "contentType": "application/json; charset=utf-8",
      "beforeSend": fnBeforeSend,
      "success": fnSuccess,
      "error": fnError
   }); 
};

function getDateTimeFilter(jParams, fnBeforeSend, fnSuccess, fnError){
   $.ajax({
      "url": "/datetime",
      "type": "POST",
      "datatype":"json",
      "contentType": "application/json; charset=utf-8",
      "data": jParams,
      "beforeSend": fnBeforeSend,
      "success": fnSuccess,
      "error": fnError
   });  
};