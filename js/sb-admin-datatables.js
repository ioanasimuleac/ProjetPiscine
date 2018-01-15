// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTableEditeur').DataTable({
    language: {
      url: "./French.json",
      lengthMenu:[5,10,15,20,25],
      pageLength: 10000,
      columns: [
            {type: "text"},
            {type: "html"},
            {orderable: false}

        ]
    }
  });
});
