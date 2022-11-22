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
