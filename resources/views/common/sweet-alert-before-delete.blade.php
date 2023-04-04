@push('page_scripts')
    <script type="text/javascript">
        function deleteRecord(e, id) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete these records? \n This process cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#{{ $formName }}'+id).submit();
                }
            })
        }
    </script>
@endpush