    <div class="c_form_main cdt">
        <div class="container bg-c">
           <div class="bg-c-1">
              <form method="POST">
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
                        <select name="" id="" class="select2">
                            <option value="">District</option>
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
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
