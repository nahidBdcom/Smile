    <div class="c_form_main cdt">
        <div class="container bg-c">
           <div class="bg-c-1">
              <form class="connectivityRequestForm needs-validation" method="POST" id="connectivity_request_form" action="{{url("connectivity_request")}}" novalidate>
                {{ csrf_field() }}
                 <div class="c_form">
                    <h2>Connectivity Form</h2>
                    <p class="dot_ind"><span class="dot_ind_2">*</span>indicates mandatory field</p>
                 </div>

                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="name"><span class="dot_ind_2">*</span>Full Name</label>
                          <input type="text" class="form-control" name="name" placeholder="" id="connectivity-form-Name" required>
                          <div class="invalid-feedback">Please provide your name.</div>
                          <span class="text-danger error-text name_error"></span>
                       </div>
                    </div>
                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="phone"><span class="dot_ind_2">*</span>Phone Number</label>
                          <input type="text" class="form-control" name="phone" id="connectivity-form-Phone" placeholder="" required>
                          <div class="invalid-feedback">Please provide a valid Phone Number.</div>
                          <span class="text-danger error-text phone_error"></span>
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>

                 <div class="row">

                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="email"><span class="dot_ind_2">*</span>email</label>
                          <input type="email" class="form-control" name="email" id="connectivity-form-Email" placeholder="" required>
                          <div class="invalid-feedback">Please provide a valid email address.</div>
                          <span class="text-danger error-text email_error"></span>
                       </div>
                    </div>


                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="address"><span class="dot_ind_2">*</span>Full Address</label>
                          <input type="text" class="form-control" placeholder="" id="connectivity-form-Address" required>
                          <div class="invalid-feedback">Please provide a valid address.</div>
                          <span class="text-danger error-text address_error"></span>
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>

                 <!--  row   -->
                 <div class="row">

                    <div class="col-md-6 ">
                       <div class="form-group mz-src">
                        <select name="district" id="connectivity-form-District" class="select2" required>
                            <option value="">District</option>
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a District.</div>
                        <span class="text-danger error-text district_error"></span>
                       </div>
                    </div>


                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group mz-src mz-src-2">

                          <select name="package" id="connectivity-form-package"  required>
                             <option value="">Select Packages</option>
                             @foreach ($packages as $package)
                                <option value="{{$package->id}}">{{$package->title}}</option>
                             @endforeach
                            
                          </select>
                          <div class="invalid-feedback">Please select a package.</div>
                          <span class="text-danger error-text package_error"></span>
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>
                 <!--  row   -->
                 <div class="row">
                    <div class="col-md-6">
                       <div class="form-group rfr">
                          <label class="dtn" for="referral"></label>
                          <input type="text" class="form-control" name="referral" placeholder="Referrer Smile ID (Optional)" id="connectivity-form-referral">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                    <div class="col-md-6">
                       <div class="form-group rfr">
                          <label class="dtn" for="promo"></label>
                          <input type="text" class="form-control" name="promo" id="connectivity-form-promo" placeholder="Promo Code (Optional)">
                       </div>
                    </div>
                    <!--  col-md-6   -->
                 </div>
                 <p class="c_form_p">By submitting this form, you agree with the
                    <a href="{{route('terms_of_use')}}">Terms and Conditions</a> <br>
                    and
                    <a href="{{route('privacy_policy')}}">Privacy Policy</a> of Smile Broadband.
                 </p>
                 <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                 <button type="submit" class="btn btn-2" id="connectivity-form-submit">
                    Submit
                    <svg class="ml-17" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="https://www.w3.org/2000/svg">
                       <path d="M1.76465 14.3242L8.04247 8.04634L1.76465 1.76852" stroke="#808080" stroke-width="2.57914" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                 </button>
              </form>
           </div>
        </div>
     </div>
