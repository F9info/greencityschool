@push('page_scripts')
    <script type="text/javascript">
        function preview_image(){
            var total_file=document.getElementById($(this).attr("id")).files.length;
            for(var i=0;i<total_file;i++)
            {
                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
            }
        }
        function readURL(input, preview) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $('.edit-image'+preview.replace('image_preview','')).hide();
                $('#'+preview).empty();
                reader.onload = function (e) {
                    $('#'+preview).append("<img src='"+e.target.result+"' height='100'>");
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush