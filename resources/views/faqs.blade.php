@extends('layouts.smile.master')


@section('content')



<div class="breadcrumb_area">
    <div class="container">
       <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </nav>
       </div>
    </div>
 </div>

 @include('partials.faq_head')

 <div class="faq_area_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq_area_content_2">
                    <div class="faq_type">
                        <form action="#">
                            <select name="district" id="faq_type" onchange="getTypeWiseFAQs('{{route("contents.faqs")}}','{{csrf_token()}}',this)">
                                <option value="">FAQ Type</option>
                                    @foreach ($contents as $content)
                                        <option value="{{$content->id}}">{{$content->faq_select_display_text}}</option>
                                    @endforeach
                            </select>
                        </form>
                    </div>
                    <div id="accordion" class="mz-c-faq">
                        <div id="accordion" class="mz-c-faq">
                            @foreach ($faqs as $faq)
                                <div class="card">
                                    <div class="card-header" id="headingOne-{{$faq->id}}">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-{{$faq->id}}" aria-expanded="false" aria-controls="collapseOne-{{$faq->id}}">
                                            {{$faq->title}}
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne-{{$faq->id}}" class="collapse" aria-labelledby="headingOne-{{$faq->id}}" data-parent="#accordion">
                                        <div class="card-body">{!! $faq->description !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>





@endsection


<script>
    function getTypeWiseFAQs(url,token, param){
        let post_data = {
            content_id: param.value,
        }

        $.post(url,{ _token:token, post_data: post_data }, function(response) {
            $("#accordion").fadeOut(500, function(response){
                $("#accordion").empty();
            });
            setTimeout(function(){
                $("#accordion").html(response);
            }, 800)
        }).done(function(response) {
            $("#accordion").fadeIn(500, function(){
            });

            //$('#ajax-data').fadeOut( "slow", function(response) {
            //});
            //$('.append_inside').html(response);
            //$('#append_inside').fadeOut( "slow", function(response) {
            //});
        }).fail(function() {
            return "Something went wrong!";
        });

    }
</script>
