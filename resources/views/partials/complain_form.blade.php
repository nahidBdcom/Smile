    <form class="row gy-2 gx-3 align-items-center complainForm needs-validation" method="POST" id="connectivity_request_form" action="{{url("user_complain")}}" novalidate>
        {{ csrf_field() }}
        <div class="col-12">
            <input type="text" class="form-control" id="complain-form-smile-id" name="smileid" placeholder="SMILE User ID *" required>
            <div class="invalid-feedback">Please provide your Smile uaseID.</div>
            <span class="text-danger error-text smileid_error"></span>
        </div>
        <div class="col-12">
            <input type="text" class="form-control" id="complain-form-Phone" name="phone" placeholder="Phone Number *" required>
            <div class="invalid-feedback">Please provide a valid Phone Number.</div>
            <span class="text-danger error-text phone_error"></span>
        </div>
        <div class="col-12 ">
            <select class="form-select problemSelect2 form-select-lg" id="complain-form-Problem" name="problem_type" placeholder="Problem Type *" required>
                @foreach ($problemTypes as $problemType)
                <option value="{{$problemType->id}}">{{$problemType->title}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select a Problem Type.</div>
            <span class="text-danger error-text problem_type_error"></span>
        </div>
        <div class="col-12">
            <textarea class="form-control" id="complain-form-address" name="problem_details" placeholder="Problem Details" ></textarea>
        </div>
        <div class="col-12">
            <input class="form-check-input" type="checkbox" value="" id="complain-form-policy" name="policy">
            <label class="form-check-label s-px-4" for="complain-form-policy"> <sup>*</sup> agree with the privacy policy of smile broadband-internetfor all.</label>
            <div class="invalid-feedback">Please agree with the privacy policy.</div>
            <span class="text-danger error-text policy_error"></span>
        </div>
        <div class="col-md-3">
            <button class="btn complainFormSubmitBtn" type="submit" id="complain-form-submit" disabled>Submit</button>
        </div>
        <div class="col-md-9">
            <p class="complainRequestSuccessHead"></p>
            <p class="complainRequestSuccessMessage"></p>
        </div>
    </form>
