@php
$title_body = $head->where('slug','frequently-ask-questions')->first();
@endphp
<div class="faq_area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="page-header">
                <h2>{{$title_body->description_title }}</h2>
                <p>{!! $title_body->description_more !!}</p>
             </div>
          </div>
       </div>
    </div>
 </div>
