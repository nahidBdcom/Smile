        <form class="row gy-2 gx-3 align-items-center contactUsForm" method="POST" id="contact_us_form" action="{{url("contact/get_information_request")}}">
            {{ csrf_field() }}
            <div class="form-floating col-md-12 position-relative">
                <input type="text" class="form-control" id="floatingName" name="info_name" placeholder="Your name here" required>
                <label for="floatingName">Name<sup>*<sup></label>
                <div class="invalid-tooltip">Please provide your name.</div>
                <span class="text-danger error-text info_name_error"></span>
            </div>
            <div class="form-floating col-md-12 position-relative">
                <input type="text" class="form-control" id="floatingPhone" name="info_phone" placeholder="Your phone numbe here" required>
                <label for="floatingPhone">Phone Number<sup>*<sup></label>
                <div class="invalid-tooltip">Please provide a valid Phone Number.</div>
                <span class="text-danger error-text info_phone_error"></span>
            </div>
            <div class="form-floating col-md-12 position-relative">
                <input type="email" class="form-control" id="floatingEmail" name="info_email" placeholder="name@example.com" required>
                <label for="floatingEmail">Email Address<sup>*<sup></label>
                <div class="invalid-tooltip">Please provide a valid email address.</div>
                <span class="text-danger error-text info_email_error"></span>
            </div>
            <div class="form-floating col-12">
                <textarea class="form-control" id="floatingDetails" name="info_details"></textarea>
                <label for="floatingDetails">How can we help?</label>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Send </button>
            </div>
            <div class="col-md-9">
                <p class="getInformationSuccessHead"></p>
                <p class="getInformationSuccessMessage"></p>
            </div>
        </form>
