<div class="container-fluid customizedSolutionFluid">
    <section class="container  py-5 py-md-6 py-lg-7 customizedSolution">
        <p class="text-center" >
            <img class="" src="{{url("/storage/". setting('site.customized_solution_icon'))}}" alt="control">
        </p>
        <h2 class="text-center customized-solution-header" >{{ setting('site.customized_solution_title') }}</h2>
        <p class="text-center customized-solution-body" >{!! nl2br(setting('site.customized_solution_description')) !!}</p>
        <form class="row gy-2 gx-3 align-items-center customizedSolutionForm" method="POST" id="solution_request_form" action="{{url("custom_solution_request")}}">
            {{ csrf_field() }}
            <div class="form-floating col-md-4 position-relative">
                <input type="text" class="form-control" id="floatingName" name="guest_name" placeholder="Your name here" required>
                <label for="floatingName">Name<sup>*<sup></label>
                <div class="invalid-tooltip">Please provide your name.</div>
                <span class="text-danger error-text guest_name_error"></span>
            </div>
            <div class="form-floating col-md-4 position-relative">
                <input type="text" class="form-control" id="floatingPhone" name="guest_phone" placeholder="Your phone numbe here" required>
                <label for="floatingPhone">Phone Number<sup>*<sup></label>
                <div class="invalid-tooltip">Please provide a valid Phone Number.</div>
                <span class="text-danger error-text guest_phone_error"></span>
            </div>
            <div class="form-floating col-md-4 position-relative">
                <input type="email" class="form-control" id="floatingEmail" name="guest_email" placeholder="name@example.com" required>
                <label for="floatingEmail">Email Address<sup>*<sup></label>
                <div class="invalid-tooltip">Please provide a valid email address.</div>
                <span class="text-danger error-text guest_email_error"></span>
            </div>
            <div class="form-floating col-12 position-relative">
                <select class="form-select" id="floatingType" name="guest_req_type" placeholder="Requirement Type" required>
                    <!-- <option selected>Select one</option> -->
                    @foreach ($requirementTypes as $requirementType)
                    <option value="{{$requirementType->id}}">{{$requirementType->title}}</option>
                    @endforeach
                </select>
                <label for="floatingType">Requirement Type<sup>*<sup></label>
                <div class="invalid-tooltip">Please select a requirement type.</div>
                <span class="text-danger error-text guest_req_type_error"></span>
            </div>
            <div class="form-floating col-12">
                <textarea class="form-control" id="floatingDetails" name="guest_details"></textarea>
                <label for="floatingDetails">Requirement Details</label>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Send </button>
            </div>
            <div class="col-md-9">
                <p class="customizedSolutionSuccessHead"></p>
                <p class="customizedSolutionSuccessMessage"></p>
            </div>
        </form>
    </section>
</div>
