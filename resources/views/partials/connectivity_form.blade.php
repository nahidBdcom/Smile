    <div class="container  py-5 py-md-6 py-lg-7 connectivityFormSection">
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
    </div>
