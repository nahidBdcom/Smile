{{--  <div id="ajax-data">  --}}
    @foreach ($faqs as $faq)
        <div id="accordion-{{$faq->id}}" class="mz-c-faq">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne-{{$faq->id}}" aria-expanded="false" aria-controls="collapseOne-{{$faq->id}}">
                            {{$faq->title}}
                        </button>
                    </h5>
                </div>

                <div id="collapseOne-{{$faq->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-{{$faq->id}}">
                    <div class="card-body">
                        {!! $faq->description !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
{{--  </div>  --}}
