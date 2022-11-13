    {{-- <div class="container  py-5 py-md-6 py-lg-7 connectivityFormSection">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 connectivity-form-header">Apply for Connectivity</div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-8 offset-md-2 connectivity-form-div">
                <form class="row gy-2 gx-3 align-items-center connectivityRequestForm needs-validation" method="POST" id="connectivity_request_form" action="{{url("connectivity_request")}}" novalidate>
                    <div class="col-12">
                        <input type="text" class="form-control" id="connectivity-form-Name" name="name" placeholder="Name *" required>
                        <div class="invalid-feedback">Please provide your name.</div>
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" id="connectivity-form-Phone" name="phone" placeholder="Phone Number *" required>
                        <div class="invalid-feedback">Please provide a valid Phone Number.</div>
                        <span class="text-danger error-text phone_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="email" class="form-control" id="connectivity-form-Email" name="email" placeholder="Email Address *" required>
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <select class="form-select connectivityDistrictSelect2 form-select-lg" id="connectivity-form-District" name="district" placeholder="District *" required>
                            <option value="" selected  disabled>Please select a district</option>
                            @foreach ($districts as $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a District.</div>
                        <span class="text-danger error-text district_error"></span>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <select class="form-select connectivityLocalitySelect2 form-select-lg" id="connectivity-form-Locality" name="locality" placeholder="Area/Locality *" required disabled>
                        </select>
                        <div class="invalid-feedback">Please select a Area/Locality.</div>
                        <span class="text-danger error-text locality_error"></span>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" id="connectivity-form-address" name="address" placeholder="Detail Address" ></textarea>
                    </div>
                    <div class="col-12 ">
                        <select class="form-select"  id="connectivity-form-package" name="package" placeholder="Desired Package">
                            @foreach ($packages as $package)
                            <option value="{{$package->id}}">{{$package->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-tooltip">Please select a package.</div>
                        <span class="text-danger error-text package_error"></span>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control" id="connectivity-form-referral" name="referral" placeholder="Referral Smile ID/Promo Code (if any)">
                        <span class="text-danger error-text referral_error"></span>
                    </div>
                    <div class="col-12">
                        <input class="form-check-input" type="checkbox" value="1" id="connectivity-form-policy" name="policy">
                        <label class="form-check-label s-px-4" for="connectivity-form-policy"> <sup>*</sup> agree with the privacy policy of smile broadband-internetfor all.</label>
                        <div class="invalid-feedback">Please agree with the privacy policy.</div>
                        <span class="text-danger error-text policy_error"></span>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" id="connectivity-form-submit" disabled>Submit</button>
                    </div>
                    <div class="col-md-9">
                        <p class="connectivityRequestSuccessHead"></p>
                        <p class="connectivityRequestSuccessMessage"></p>
                    </div>
                
                
                </form>
            </div>
        </div>
    </div> --}}


    <div class="c_form_main cdt">
        <div class="container bg-c">
           <div class="bg-c-1">
              <form>
                 <div class="c_form">
                    <h2>Connectivity Form</h2>
                    <p class="dot_ind"><span class="dot_ind_2">*</span>indicates mandatory field</p>
                 </div>

                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="company"><span class="dot_ind_2">*</span>Full Name</label>
                          <input type="text" class="form-control" placeholder="" id="company">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="phone"><span class="dot_ind_2">*</span>Phone Number</label>
                          <input type="text" class="form-control" id="phone" placeholder="">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>

                 <div class="row">

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="email"><span class="dot_ind_2">*</span>email</label>
                          <input type="email" class="form-control" id="email" placeholder="">
                       </div>
                    </div>


                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="last"><span class="dot_ind_2">*</span>Full Address</label>
                          <input type="text" class="form-control" placeholder="" id="last">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>

                 <!--  row   -->
                 <div class="row">
     
                    <div class="col-md-6 ">
                       <div class="form-group mz-src">
                          <div class="dropdown">
                             <button onclick="myFunction()" class="dropbtn dropbtn_2">
                                <span class="dot_ind_2">*</span> District 
                                <svg class="ml-15" width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="https://www.w3.org/2000/svg">
                                   <path d="M14.8038 2.36929C15.1943 1.97877 15.1943 1.3456 14.8038 0.955076C14.4133 0.564552 13.7801 0.564554 13.3896 0.955079L14.8038 2.36929ZM7.56684 8.19205L6.85973 8.89915C7.04727 9.08669 7.30162 9.19205 7.56684 9.19205C7.83206 9.19205 8.08641 9.08669 8.27395 8.89915L7.56684 8.19205ZM1.74408 0.955076C1.35356 0.564552 0.720392 0.564552 0.329868 0.955076C-0.0606559 1.3456 -0.060656 1.97877 0.329868 2.36929L1.74408 0.955076ZM13.3896 0.955079L6.85973 7.48494L8.27395 8.89915L14.8038 2.36929L13.3896 0.955079ZM8.27394 7.48494L1.74408 0.955076L0.329868 2.36929L6.85973 8.89915L8.27394 7.48494Z" fill="#03314B"/>
                                </svg>
                             </button>
                             <div id="myDropdown" class="dropdown-content dropdown-content-dis ">
                                <input type="text" placeholder="Search District" id="myInput" onkeyup="filterFunction()">
                                <a href="#">Dhaka</a>
                                <a href="#">Khulna</a>
                                <a href="#">Cumilla</a>
                                <a href="#">Kushtia</a>
                                <a href="#">Barishal</a>
                                <a href="#">Vula</a>
                                <a href="#">Feni</a>
                             </div>
                          </div>
                       </div>
                    </div>


                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group mz-src mz-src-2">

                          <select id="" name="country">
                             <option value="">Select Packages</option>
                             @foreach ($packages as $package)
                                <option value="{{$package->id}}">{{$package->title}}</option>
                             @endforeach
                             {{-- <option value="">Silver</option>
                             <option value="canada">Silver Supreme</option>
                             <option value="usa">Gold</option>
                             <option value="usa">Daimond</option>
                             <option value="usa">Ek Desh Ek Rate P1</option>
                             <option value="usa">Ek Desh Ek Rate P2</option> --}}
                          </select>
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>
                 <!--  row   -->
                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group rfr">
                          <label class="dtn" for="company"></label>
                          <input type="text" class="form-control" placeholder="Referrer Smile ID (Optional)" id="company">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group rfr">
                          <label class="dtn" for="phone"></label>
                          <input type="text" class="form-control" id="phone" placeholder="Promo Code (Optional)">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>
                 <p class="c_form_p">By submitting this form, you agree with the 
                    <a href="terms.html">Terms and Conditions</a> <br>
                    and 
                    <a href="privacy.html">Privacy Policy</a> of Smile Broadband. 
                 </p>
                 <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                 <button type="submit" class="btn btn-2">
                    Submit 
                    <svg class="ml-17" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="https://www.w3.org/2000/svg">
                       <path d="M1.76465 14.3242L8.04247 8.04634L1.76465 1.76852" stroke="#808080" stroke-width="2.57914" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                 </button>
              </form>
           </div>
        </div>
     </div>