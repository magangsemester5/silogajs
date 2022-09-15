// Call the dataTables jQuery plugin
$(document).ready(function () {
	$("#dataTable").DataTable({
        order: [[1, 'asc']],
		dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
            }
        ]
	});
});
