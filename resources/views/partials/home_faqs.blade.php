@foreach ($faqs as $faq)
<div class="card">
<div class="card-header" id="{{$faq->id}}">
    <h5 class="mb-0">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
         {{$faq->title}}
      </button>
    </h5>
  </div>

  <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="{{$faq->id}}" data-parent="#accordion">
    <div class="card-body">
      {!! $faq->description !!}
    </div>
  </div>   
</div> 
@endforeach