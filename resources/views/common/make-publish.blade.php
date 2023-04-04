
                <td>
                    <div class="icheck-primary">
                        <div class="custom-control custom-switch custom-publish-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch{{ $id }}" name="publish" {{ $publish == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch{{ $id }}">&nbsp;</label>
                        </div>
                    </div>
                </td>

@push('page_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).on('change', '.custom-publish-switch', function (e) {
            var id = $(this).children('.custom-control-input').attr('id').replace('customSwitch','');
            if(e.target.checked == true){
                var publish = 1;
            }else{
                var publish = 0;
            }
            window.location.replace("{{ url('make-publish') }}/{{ $type }}/"+id+"/"+publish);
        });
    </script>
@endpush
