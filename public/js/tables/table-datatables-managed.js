function addDefaultsOptions(jTableOptions) {
   jTableOptions.lengthMenu = [[10, 20, 50, -1], [10, 20, 50, 'Todos']];
   jTableOptions.scrollY = 440;
   jTableOptions.scrollCollapse = true;
   jTableOptions.scrollX = true;
};

function bindTableHeaders(table, arrColumns) {
    let $thead = $(table.find('thead'));
    let $tr = $('<tr>');
    $thead.html('');

    for (var itemColum of arrColumns) {
        //if (!itemColum || !itemColum.headName)
        //    debugger;

        let $th = $('<th>');

        if (itemColum && itemColum.headName)
            $th.html(itemColum.headName);

        $tr.append($th);
    }

    $thead.append($tr);
};

function bindTable(idTable, typeTable){
   let $table = $(idTable);

   if (typeTable.isDinamycColumns) {
      bindTableHeaders($table, typeTable.columns);
   }

   let fnBeforeSend = () => {
   };

   let fnSuccess = (data) => {
      let jsonOptions = $.extend({}, typeTable);

      jsonOptions.data = data;
      jsonOptions.createdRow = function (row, data, dataIndex) {
      };

      addDefaultsOptions(jsonOptions);

      try {
         $table.DataTable().destroy();
         $table.DataTable(jsonOptions);
      }
      catch (e) {
         console.log(e);
      }
   };

   let fnError = (data) => {
      $.bootstrapGrowl("Error: usuarios no cargados.", {
         ele: 'body', // which element to append to
         type: 'danger', // (null, 'info', 'danger', 'success')
         offset: {from: 'top', amount: 20}, // 'top', or 'bottom'
         align: 'right', // ('left', 'right', or 'center')
         width: 250, // (integer, or 'auto')
         delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
         allow_dismiss: true, // If true then will display a cross to close the popup.
         stackup_spacing: 10 // spacing between consecutively stacked growls.
      });
   }

   typeTable.fnGet(fnBeforeSend, fnSuccess, fnError);
};