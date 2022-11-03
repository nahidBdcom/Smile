@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $mainContent["seo_titlle"] }}</title>
        <meta name="description" content="{{ $mainContent["meta_description"] }}">
        <meta name="keywords" content="{{ $mainContent["meta_keyword"] }}">
@endsection     

@section('social_media_meta')
        
        <meta property="og:url"                content="{{url()->current()}}" />
        <meta property="og:title"              content="{{ $mainContent["og_title"] }}" />
        <meta property="og:description"        content="{{ $mainContent["og_description"] }}" />
        <meta property="og:image"              content="{{ asset('storage/'.$mainContent["og_image"]) }}" />
        <meta property="og:type"               content="website" />

        <meta property="twitter:site"          content="{{url()->current()}}" />
        <meta property="twitter:title"         content="{{ $mainContent["og_title"] }}" />
        <meta property="twitter:description"   content="{{ $mainContent["og_description"] }}" />
        <meta property="twitter:image"         content="{{ asset('storage/'.$mainContent["og_image"]) }}" />
        <meta property="twitter:card"          content="summary" />

@endsection     

@section('extra_meta')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection     


@section('additional-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')
        <div class="container-fluid smile-content-title d-flex align-items-center justify-content-center">
                <div class="row">
                        <div class="col-12">{{ $mainContent["title"] }}</div>
                </div>
        </div>
        <div class="container s-pt-50">
                <div class="row">
                    <div class="col-12 col-md-6 s-pb-25 connectivity-title">
                        {{ $mainContent["description_title"] }}
                    </div>
                    <div class="col-12 connectivity-description_excerpt">
                        {!! $mainContent["description_excerpt"] !!}
                    </div>
                    <div class="col-12 connectivity-description_excerpt">
                        {!! $mainContent["description_more"] !!}
                    </div>
                </div>
        </div>
        @if($districts->count())
        <!-- Connectivity Request Form Block -->
        @include('partials.connectivity_form')
        <!-- Connectivity Request Form Block End -->
        @endif

        @if($faqs->count())
        <!-- FAQ 12 Block -->
        @include('partials.faqs_4',['title' => "FREQUENTLY ASKED QUESTIONS"])
        <!-- FAQ 12 Block End -->
        @endif
@endsection

@section('additional-javascripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>   
    <script language="javascript">
        $(document).ready(function() {
            var $districtSelect2 =$('.connectivityDistrictSelect2');
            var $localitySelect2 =$('.connectivityLocalitySelect2');

            $districtSelect2.select2({
                placeholder: 'District *',
                theme: "bootstrap-5",
            });
            $localitySelect2.select2({
                placeholder: 'Area/Locality *',
                theme: "bootstrap-5",
            });

            $districtSelect2.on("change", function (e) { 
                //alert($(districtSelect2).val()); 
                $localitySelect2.empty();
                $localitySelect2.prop("disabled", true);
                $.ajax({
                    method: "POST",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "district": $districtSelect2.val()
                    },
                    url: "{{url("getDistrictLocalityData")}}",
                    }).done(function( msg ) {
                    if(msg.error == 0){
                        if(msg.status == 1){
                            $localitySelect2.prop("disabled", false);
                            msg.data.map(function(item) {
                                var newOption = new Option(item.text, item.id, false, false);
                                $localitySelect2.append(newOption);
                            });

                        }
                           
                    }else{
                    }
                });
            });  

            /*checkbox*/
            $('#connectivity-form-policy').click(function(){
                if($(this).prop("checked") == true){
                    $('#connectivity-form-submit').prop("disabled", false);
                }
                else if($(this).prop("checked") == false){
                    $('#connectivity-form-submit').prop("disabled", true);
                }
            });

            /*form validation*/
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault()
                    form.classList.add('was-validated')
                    if (!form.checkValidity()) {
                    	event.stopPropagation()
		    }
		    else
		    {
			   /*Ajax Request Header setup*/
   			   $.ajaxSetup({
      				headers: {
          				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
  			   });

                    	form.classList.add('was-validated')

		        $.ajax({
            			url:$(this).attr('action'),
            			method:$(this).attr('method'),
            			data:new FormData(this),
            			processData:false,
            			dataType:'json',
            			contentType:false,
            			beforeSend:function(){
                			$('span.name_error').text('');
                			$('span.phone_error').text('');
                			$('span.email_error').text('');
                			$('span.district_error').text('');
                			$('span.locality_error').text('');
                			$('span.package_error').text('');
                			$('span.policy_error').text('');
                			$('p.connectivityRequestSuccessHead').text('');
                			$('p.connectivityRequestSuccessMessage').text('');
        			},
            			success:function(data){
                			if(data.status == 0){
                    				$.each(data.error, function(prefix,val){
                        				$('span.'+prefix+'_error').text(val[0]);
                    				});
                			}else{
                    				form.classList.remove('was-validated');
						$('#connectivity_request_form')[0].reset();
						$('#connectivity-form-submit').prop("disabled", true);
						$('.connectivityDistrictSelect2').val(null).trigger('change');
						$('#connectivity-form-Locality').empty();
						$('#connectivity-form-Locality').prop("disabled", true);
                    				$('p.connectivityRequestSuccessHead').text(' Sent successfully!');
                    				$('p.connectivityRequestSuccessHead').prepend('<img src="{{asset("assets/images/success_logo.png")}}" alt="success">');
                    				$('p.connectivityRequestSuccessMessage').text('Our team will contact you very soon.');
                			}

            			}
        		});
			    
		    }

                }, false)
                })
            })()

        });          

                             
    </script>
@endsection      
