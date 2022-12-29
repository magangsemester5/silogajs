// Call the dataTables jQuery plugin
$(document).ready(function () {
    $("#dataTable").DataTable({
        // order: [[, 'asc']],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend: 'pdfHtml5',
                className: 'nectar-button medium regular extra-color-1 regular-button tableBtn',
            },
            {
                extend: 'excelHtml5',
                className: 'nectar-button medium regular extra-color-1 regular-button tableBtn',
            },
        ]
    });
});
