@push('page_scripts')
    <script>
        $(window).on('beforeunload', function() {
            if ($('form').find('input').filter(function() { return this.value; }).length) {
                return "You have entered data on this page. Are you sure you want to leave?";
            }
        });
    </script>
@endpush