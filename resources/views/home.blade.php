
   @extends("layouts.smile.master")
   @section("additional-coveragearea-css")
   <style>
      /* #coverage_location, #coverage_location>option {
         width: 500px;
         white-space: normal;
      } */
      </style>
   @endsection
   @section('content')

  
       <main> 
         @include("partials.homepage_slider_updated")
        
         @include("partials.homepage_description")
        
         @include("partials.hompage_packages_updated")
         
         @include("partials.hompage_review_slider")



         @include("partials.hompage_coverage_area")
              
         @include("partials.homepage_faq_section")
         
         @include("partials.homepage_contact_form")
         
         @include("partials.homepage_contact_info")
      </main>

     
@endsection

      

      
