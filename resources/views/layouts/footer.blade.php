<!-- Footer Area -->
</div>
</div>
</div>

<!-- Java Script Link -->
<script type="text/javascript" src="{{ asset('/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/sweetalert2@8.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/all.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/main.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/select2.full.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    $(function () {


        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        //For Image Preview
        $("#image").on('change', function () {
            var imgPath = $(this)[0].value;
            var extension = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (extension === "gif" || extension === "png" || extension === "jpg" || extension === "jpeg"){
                if (typeof (FileReader) != "undefined") {

                    var image_holder = $("#image-holder");
                    image_holder.empty();

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "img-thumbnail"
                        }).appendTo(image_holder);
                    };
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }else {
                alert("Please Select Image Only !");
            }
        });

    });

</script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>--}}

@stack('customScripts')

</body>
</html>
