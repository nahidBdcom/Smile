<!-- FAQs section START -->
<div class="container-fluid faqsFluid">
    <section class="container  faqs-container">
        <div class="row pt-2">
            <p class="d-flex justify-content-center smile-faqs-title">{{ $title }}</p>
        </div>
        <div class="row pt-2">
            @foreach ($faqs as $faq)    
            <div class="col-12 col-md-6 col-lg-4 mb-grid-gutter pb-1 faq-item">
                <div class="mx-auto">
                    <p class="faq-head">{{$faq->title}}</p>
                    <span class="fs-sm mb-0 desc faq-body">{!! $faq->description !!}</span>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</div>

<!-- FAQs section END -->