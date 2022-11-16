@extends('layouts.smile.master')

@section('additional-style-connectivity-form-css')
    <link rel="stylesheet" href="{{asset('assets/css/update/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--single {
            border: none;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 30px;
        }
    </style>
@endsection

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


{{-- @section('additional-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
@endsection --}}

@section('content')
<div class="breadcrumb_area sml-wht">
    <div class="container">
       <div class="row">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Connectivity Form</li>
             </ol>
          </nav>
       </div>
    </div>
 </div>
        @if($districts->count())
        <!-- Connectivity Request Form Block -->
        @include('partials.connectivity_form')
        <!-- Connectivity Request Form Block End -->
        @endif

       
@endsection

@section('additional-style-connectivity-form-js')
    <script src="{{asset('assets/js/update/select2.min.js')}}"></script>
    <script language="javascript">
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select",
                allowClear: true,
            });

            /*checkbox*/
            // $('#connectivity-form-policy').click(function(){
            //     if($(this).prop("checked") == true){
            //         $('#connectivity-form-submit').prop("disabled", false);
            //     }
            //     else if($(this).prop("checked") == false){
            //         $('#connectivity-form-submit').prop("disabled", true);
            //     }
            // });

            /*form validation*/
            (function () {
            'use strict'

            

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    
                    event.preventDefault()
                    form.classList.add('was-validated')
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                    	event.stopImmediatePropagation();
		            }
                    else
                    {
                
                // event.preventDefault();
                
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
                            $('span.address_error').text('');
                			$('span.district_error').text('');
                            $('span.package_error').text('');
                			// $('span.locality_error').text('');
                			// $('span.policy_error').text('');
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
                                    $('.select2').val(null).trigger('change');
                                    // window.location = "{{route('success')}}";
                                    // $('.connectivityDistrictSelect2').val(null).trigger('change');
                                    // $('#connectivity-form-Locality').empty();
                                    // $('#connectivity-form-Locality').prop("disabled", true);
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
