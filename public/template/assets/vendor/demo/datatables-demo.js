// Call the dataTables jQuery plugin
$(document).ready(function () {
	$("#dataTable").DataTable({
        // order: [[, 'asc']],
		dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                },
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
        ]
	});
});
