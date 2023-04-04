@push('page_scripts')
    <script type="text/javascript">
        // State City List
        var series = [{
                state: "Andhra Pradesh",
                city: "Alluri Sitharama Raju District"
            },
            {
                state: "Andhra Pradesh",
                city: "Anakapalli"
            },
            {
                state: "Andhra Pradesh",
                city: "Ananthapuram"
            },
            {
                state: "Andhra Pradesh",
                city: "Annamaya"
            },
            {
                state: "Andhra Pradesh",
                city: "Bapatla"
            },
            {
                state: "Andhra Pradesh",
                city: "Chittoor"
            },
            {
                state: "Andhra Pradesh",
                city: "East Godavari"
            },
            {
                state: "Andhra Pradesh",
                city: "Eluru"
            },
            {
                state: "Andhra Pradesh",
                city: "Guntur"
            },
            {
                state: "Andhra Pradesh",
                city: "Kakinada"
            },
            {
                state: "Andhra Pradesh",
                city: "Kona Seema"
            },
            {
                state: "Andhra Pradesh",
                city: "Krishna"
            },
            {
                state: "Andhra Pradesh",
                city: "Kurnool"
            },
            {
                state: "Andhra Pradesh",
                city: "Manyam"
            },
            {
                state: "Andhra Pradesh",
                city: "Nandyal"
            },
            {
                state: "Andhra Pradesh",
                city: "NTR"
            },
            {
                state: "Andhra Pradesh",
                city: "Palnadu"
            },
            {
                state: "Andhra Pradesh",
                city: "Prakasam"
            },
            {
                state: "Andhra Pradesh",
                city: "SPS Nellore"
            },
            {
                state: "Andhra Pradesh",
                city: "Sri Balaii"
            },
            {
                state: "Andhra Pradesh",
                city: "Sri Satyasai"
            },
            {
                state: "Andhra Pradesh",
                city: "Srikakulam"
            },
            {
                state: "Andhra Pradesh",
                city: "Visakhapatnam"
            },
            {
                state: "Andhra Pradesh",
                city: "Vizianagaram"
            },
            {
                state: "Andhra Pradesh",
                city: "West Godavari"
            },
            {
                state: "Andhra Pradesh",
                city: "YSR Kadapa"
            },
            {
                state: "Telangana",
                city: "Adilabad"
            },
            {
                state: "Telangana",
                city: "Bhadradri Kothagudem"
            },
            {
                state: "Telangana",
                city: "Hanumakonda"
            },
            {
                state: "Telangana",
                city: "Hyderabad"
            },
            {
                state: "Telangana",
                city: "Jagitial"
            },
            {
                state: "Telangana",
                city: "Jangaon"
            },
            {
                state: "Telangana",
                city: "Jayashankar Bhupalpally"
            },
            {
                state: "Telangana",
                city: "Jogulamba Gadwal"
            },
            {
                state: "Telangana",
                city: "Kamareddy"
            },
            {
                state: "Telangana",
                city: "Karimnagar"
            },
            {
                state: "Telangana",
                city: "Khammam"
            },
            {
                state: "Telangana",
                city: "Kumuram Bheem"
            },
            {
                state: "Telangana",
                city: "Mahabubabad"
            },
            {
                state: "Telangana",
                city: "Mahabubnagar"
            },
            {
                state: "Telangana",
                city: "Mancherial"
            },
            {
                state: "Telangana",
                city: "Medak"
            },
            {
                state: "Telangana",
                city: "Medchal-Malkajgiri"
            },
            {
                state: "Telangana",
                city: "Mulugu"
            },
            {
                state: "Telangana",
                city: "Nagarkurnool"
            },
            {
                state: "Telangana",
                city: "Narayanpet"
            },
            {
                state: "Telangana",
                city: "Nalgonda"
            },
            {
                state: "Telangana",
                city: "Nirmal"
            },
            {
                state: "Telangana",
                city: "Nizamabad"
            },
            {
                state: "Telangana",
                city: "Peddapalli"
            },
            {
                state: "Telangana",
                city: "Rajanna Sircilla"
            },
            {
                state: "Telangana",
                city: "Ranga Reddy"
            },
            {
                state: "Telangana",
                city: "Sangareddy"
            },
            {
                state: "Telangana",
                city: "Siddipet"
            },
            {
                state: "Telangana",
                city: "Suryapet"
            },
            {
                state: "Telangana",
                city: "Vikarabad"
            },
            {
                state: "Telangana",
                city: "Wanaparthy"
            },
            {
                state: "Telangana",
                city: "Warangal Rural"
            },
            {
                state: "Telangana",
                city: "Warangal Urban"
            },
            {
                state: "Telangana",
                city: "Yadadri Bhuvanagiri"
            },
        ];
        $("#district_other").hide();
        $("#NativeState").change(function() {
            var state = $(this).val();
            if (state == "Other") {
                $("#district").hide();
                $("#district_other").show();
                $("#district_other").val("");

            } else {
                $("#district_other").hide();
                $("#district").show();
                var options =
                    '<option value=""><strong>Select District</strong></option>';
                $(series).each(function(index, value) {
                    if (value.state == state) {
                        options +=
                            '<option value="' +
                            value.city +
                            '">' +
                            value.city +
                            "</option>";
                    }
                });
                $("#district").html(options);
            }
        });

        $("#district_other2").hide();
        $("#NativeState2").change(function() {
            var state = $(this).val();
            if (state == "Other") {
                $("#district2").hide();
                $("#district_other2").show();
                $("#district_other2").val("");

            } else {
                $("#district_other2").hide();
                $("#district2").show();

                var options =
                    '<option value=""><strong>Select District</strong></option>';
                $(series).each(function(index, value) {
                    if (value.state == state) {
                        options +=
                            '<option value="' +
                            value.city +
                            '">' +
                            value.city +
                            "</option>";
                    }
                });
                $("#district2").html(options);
            }
        });

        var state1 = "{{ isset($personalDetails) ? $personalDetails->native_state : '' }}";
        var district1 = "{{ isset($personalDetails) ? $personalDetails->native_district : '' }}";
        if (state1 != "") {
            if (state1 == "Other") {
                $("#district").hide();
                $("#district_other").show();
            } else {
                $("#district_other").hide();
                $("#district").show();
                var options1 =
                    '<option value=""><strong>Select District</strong></option>';
                $(series).each(function(index, value) {
                    if (value.state == state1) {
                        options1 +=
                            '<option value="' +
                            value.city +
                            '">' +
                            value.city +
                            "</option>";
                    }
                });
                $("#district").html(options1);
                $("#district option")
                    .filter(function() {
                        //may want to use $.trim in here
                        return $(this).text() == district1;
                    })
                    .attr("selected", true);
            }
        }
        var spouseState1 = "{{ isset($personalDetails) ? $personalDetails->spouse_native_state : '' }}";
        var spouseDistrict1 = "{{ isset($personalDetails) ? $personalDetails->spouse_native_district : '' }}";
        if (spouseState1 != "") {
            if (spouseState1 == "Other") {
                $("#district2").hide();
                $("#district_other2").show();
            } else {
                $("#district_other2").hide();
                $("#district2").show();
                var options1 =
                    '<option value=""><strong>Select District</strong></option>';
                $(series).each(function(index, value) {
                    if (value.state == spouseState1) {
                        options1 +=
                            '<option value="' +
                            value.city +
                            '">' +
                            value.city +
                            "</option>";
                    }
                });
                $("#district2").html(options1);
                $("#district2 option")
                    .filter(function() {
                        //may want to use $.trim in here
                        return $(this).text() == spouseDistrict1;
                    })
                    .attr("selected", true);
            }
        }
        $(".state_pincode").change(function() {
            var state = $(this).val();
            if (state == "India") {
                $(".zipcode").attr("maxlength", "6");
                $(".zipcode").attr("minlength", "6");
            } else {
                $(".zipcode").attr("maxlength", "5");
                $(".zipcode").attr("minlength", "5");
            }
        });
    </script>
@endpush
