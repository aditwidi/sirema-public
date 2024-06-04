$(document).ready(function() {
    // Initially disable the deadline input
    $('#deadline').prop('disabled', true);

    // Initialize your datepicker
    $('#deadline').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: 'today' // Set startDate to 'today'
    });

    $('#bentukRequest').on('change', function() {
        let selectedRequestTypeId = parseInt($(this).val());

        // Enable the deadline input when a bentukRequest is selected
        $('#deadline').prop('disabled', !selectedRequestTypeId || selectedRequestTypeId === -1);

        // Check if the selected type is Video or Liputan
        if (selectedRequestTypeId === videoId || selectedRequestTypeId === liputanId) {
            // Set the disabled dates for Video and Liputan
            $('#deadline').datepicker('setDatesDisabled', disabledDates);
        } else {
            // Clear any disabled dates for other types
            $('#deadline').datepicker('setDatesDisabled', []);
        }
    });
});
