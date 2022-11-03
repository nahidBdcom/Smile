@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $mainContent["seo_titlle"] }}</title>
        <meta name="description" content="{{ $mainContent["meta_description"] }}">
        <meta name="keywords" content="{{ $mainContent["meta_keyword"] }}">
@endsection     

@section('social_media_meta')

        @include('partials.social_media_meta')
@endsection     



@section('additional-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        .complainFormSubmitBtn{
            background-color: var(--smile-yellow);
            color:var(--bs-black)l
        }
        .complainFormSubmitBtn:disabled{
            background-color: var(--smile-light-gray-200);
            color:var(--smile-gray-600)l
        }
    </style>
@endsection



@section('content')
        <div class="container-fluid smile-content-title d-flex align-items-center justify-content-center">
                <div class="row">
                        <div class="col-12">{{ $mainContent["title"] }}</div>
                </div>
        </div>
        <div class="container s-pt-50">
            <div class="row">
                <div class="col-12 connectivity-description_excerpt">
                    {!! $mainContent["description_excerpt"] !!}
                </div>
            </div>
        </div>

        <div class="container s-p-50">
            <div class="row">
                <div class="col-12 col-md-6 smile-get-info-form-block s-pb-sm-50">
                    @if($faqs->count())
                    <!-- FAQ 12 Block -->
                    @include('partials.faqs_12',['title' => "basic troubleshooting tips"])
                    <!-- FAQ 12 Block End -->
                    @endif
                </div>
                <div class="col-12 col-md-6 smile-contact-address">
                        <p class="d-flex justify-content-center smile-con-HO ">send a complain</p>
                    @if($problemTypes->count())
                    <!-- Complain form Block -->
                    @include('partials.complain_form')
                    <!-- Complain form Block Ends -->
                    @endif
                </div>
            </div>
        </div>
@endsection      



@section('additional-javascripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>   
    <script language="javascript">
        $(document).ready(function() {
            var $problemSelect2 =$('.problemSelect2');

            $problemSelect2.select2({
                placeholder: 'Problem Type *',
                theme: "bootstrap-5",
            });


            /*checkbox*/
            $('#complain-form-policy').click(function(){
                if($(this).prop("checked") == true){
                    $('#complain-form-submit').prop("disabled", false);
                }
                else if($(this).prop("checked") == false){
                    $('#complain-form-submit').prop("disabled", true);
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
		    else{
			    $.ajax({
			    	url:$(this).attr('action'),
				method:$(this).attr('method'),
				data:new FormData(this),
				processData:false,
				dataType:'json',
				contentType:false,
				beforeSend:function(){
					$('span.smileid_error').text('');
					$('span.phone_error').text('');
					$('span.problem_type_error').text('');
					$('span.policy_error').text('');
					$('p.complainRequestSuccessHead').text('');
					$('p.complainRequestSuccessMessage').text('');
				},
				success:function(data){
					if(data.status == 0){
						$.each(data.error, function(prefix,val){
							$('span.'+prefix+'_error').text(val[0]);
						});
					}else{
						form.classList.remove('was-validated');
						$('#complainForm')[0].reset();
						$('#complain-form-submit').prop("disabled", true);
						$('.problemSelect2').val(null).trigger('change');
						$('p.complainRequestSuccessHead').text(' Sent successfully!');
						$('p.complainRequestSuccessHead').prepend('<img src="http://smilewww.mybdcom.com/assets/images/success_logo.png" alt="success">');
						$('p.complainRequestSuccessMessage').text('Our team will contact you very soon.');
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
