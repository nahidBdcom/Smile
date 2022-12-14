<div class="section-6-area">
    <div class="container">
       <div class="section-6-bg text-center">
          <div class="sml-bg-opacity">
             <div class="row">
                <div class="col-lg-12">
                   <div class="section-6-wrapper">
                      <h2>{!! setting('site.coverage_area_title') !!}</h2>
                      <img src="{{asset('/storage/'.setting('site.coverage_area_logo'))}}" class="img-fluid">
                      <p>{!! setting('site.coverage_area_description') !!}</p>





                      <form action="#" class="d-none">
                         <div class="dropdown">
                            <a onclick="myFunction()" class="dropbtn dropbtn_3">District <svg class="pl-35 mz-vis" width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="https://www.w3.org/2000/svg">
                                  <path d="M14.8038 2.36929C15.1943 1.97877 15.1943 1.3456 14.8038 0.955076C14.4133 0.564552 13.7801 0.564554 13.3896 0.955079L14.8038 2.36929ZM7.56684 8.19205L6.85973 8.89915C7.04727 9.08669 7.30162 9.19205 7.56684 9.19205C7.83206 9.19205 8.08641 9.08669 8.27395 8.89915L7.56684 8.19205ZM1.74408 0.955076C1.35356 0.564552 0.720392 0.564552 0.329868 0.955076C-0.0606559 1.3456 -0.060656 1.97877 0.329868 2.36929L1.74408 0.955076ZM13.3896 0.955079L6.85973 7.48494L8.27395 8.89915L14.8038 2.36929L13.3896 0.955079ZM8.27394 7.48494L1.74408 0.955076L0.329868 2.36929L6.85973 8.89915L8.27394 7.48494Z" fill="#03314B" />
                               </svg>
                            </a>
                            <div id="myDropdown3" class="dropdown-content dropdown-content-dis-1 ">
                               <input type="text" placeholder="Search District" id="myInput3" onkeyup="filterFunction()">
                               {{-- <a href="#">Dhaka</a>
                               <a href="#">Khulna</a>
                               <a href="#">Cumilla</a>
                               <a href="#">Kushtia</a>
                               <a href="#">Barishal</a>
                               <a href="#">Vula</a>
                               <a href="#">Feni</a> --}}
                            </div>
                         </div>

                         <div class="dropdown">
                            <a onclick="myFunction()" class="dropbtn dropbtn_3 dropbtn_4 ml-15">Area <svg class="pl-35 mz-vis" width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="https://www.w3.org/2000/svg">
                                  <path d="M14.8038 2.36929C15.1943 1.97877 15.1943 1.3456 14.8038 0.955076C14.4133 0.564552 13.7801 0.564554 13.3896 0.955079L14.8038 2.36929ZM7.56684 8.19205L6.85973 8.89915C7.04727 9.08669 7.30162 9.19205 7.56684 9.19205C7.83206 9.19205 8.08641 9.08669 8.27395 8.89915L7.56684 8.19205ZM1.74408 0.955076C1.35356 0.564552 0.720392 0.564552 0.329868 0.955076C-0.0606559 1.3456 -0.060656 1.97877 0.329868 2.36929L1.74408 0.955076ZM13.3896 0.955079L6.85973 7.48494L8.27395 8.89915L14.8038 2.36929L13.3896 0.955079ZM8.27394 7.48494L1.74408 0.955076L0.329868 2.36929L6.85973 8.89915L8.27394 7.48494Z" fill="#03314B" />
                               </svg>
                            </a>
                            <div id="myDropdown2" class="dropdown-content dropdown-content-dis-2 ">
                               <input type="text" placeholder="Search Area" id="myInput2" onkeyup="filterFunction()">
                               {{-- <a href="#">Dhaka</a>
                               <a href="#">Khulna</a>
                               <a href="#">Cumilla</a>
                               <a href="#">Kushtia</a>
                               <a href="#">Barishal</a>
                               <a href="#">Vula</a>
                               <a href="#">Feni</a> --}}
                            </div>
                         </div>
                      </form>

                      <select name="coverage_district" id="coverage_district" class="cov_f mr-15">
                          <option value="" selected="selected">District</option>
                        </select>

                      <select name="coverage_location" id="coverage_location" class="cov_f ml-15">
                          <option value="" selected="selected">Area</option>
                        </select>
                        <br><br>
                        <input type="button" id="getArea" value="Submit" class="btn p-3" disabled>
                      {{--  <form name="form1" id="form1" action="/action_page.php" class="">
                      </form>  --}}

                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

 {{-- <div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{--  <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>  --}}
        {{-- <div class="modal-body">
          <h3>We are available in your area</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> --}} 
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content mz-mod">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle"></h5>
         <button type="button" class="close mod-close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <h2>We are availale in your area! </h2>
       </div>
       <div class="modal-footer">
         <a class="btn" href="{{route('connectivity')}}"> Get connectivity
            <i class="fa fa-solid fa-chevron-right btn-icon ml-15"></i>
         </a>
       </div>
     </div>
   </div>
 </div>
@php
    $location = '{';
    foreach ($districts as $district){
        //$location .= '{';
        $location .= '
            "'.$district->name.'": {';
        foreach($district->internetCoverages as $coverage){
            $location .= '
               "'. $coverage->title. '": [],'  ;
        }
        $location .= '
            },';
    }
    $location .= '
         }';
@endphp

@section('additional-javascripts')
 <script>
   var subjectObject = {!! $location !!}
    window.onload = function() {

        var subjectSel = document.getElementById("coverage_district");
        var topicSel = document.getElementById("coverage_location");

        for (var x in subjectObject) {
          subjectSel.options[subjectSel.options.length] = new Option(x, x);
        }
        subjectSel.onchange = function() {
            $('#getArea').prop('disabled', true);
        //empty Chapters- and Topics- dropdowns

      topicSel.length = 1;
          //display correct values
          for (var y in subjectObject[this.value]) {
            topicSel.options[topicSel.options.length] = new Option(y, y);
          }
        }
        topicSel.onchange = function() {
            if($('#coverage_location').val() != ''){
                $('#getArea').prop('disabled', false);
            }else{
                $('#getArea').prop('disabled', true);
            }
        //empty Chapters dropdown
        //chapterSel.length = 1;
          //display correct values
          //var z = subjectObject[subjectSel.value][this.value];
          //for (var i = 0; i < z.length; i++) {
            //chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
          //}
        }

        $( "#getArea" ).click(function() {
            if($('#coverage_location').val() != ''){
                $('#exampleModalCenter').modal('show');
            }
        });
    }
 </script>

 @endsection
