<div class="billing_details">
    <div class="row">
        <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="process_add_address.php" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="fullname" name="fullname">
                    <span class="placeholder" data-placeholder="Full name"></span>
                </div>

                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="number" name="number">
                    <span class="placeholder" data-placeholder="Phone number"></span>
                </div>

                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="region" name="region">
                    <span class="placeholder" data-placeholder="Region"></span>
                </div>

                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="province" name="province">
                    <span class="placeholder" data-placeholder="Province"></span>
                </div>

                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="city" name="city">
                    <span class="placeholder" data-placeholder="City"></span>
                </div>

                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="barangay" name="barangay">
                    <span class="placeholder" data-placeholder="Barangay"></span>
                </div>

                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                </div>

                <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" id="street" name="street">
                    <span class="placeholder" data-placeholder="Street Name, Building, House No."></span>
                </div>

                <!-- Make default address checkbox -->
                <div class="col-md-12 form-group">
                    <div class="creat_account">
                        <input type="checkbox" id="make_default" name="make_default">
                        <label for="make_default">Make default address</label>
                    </div>
                </div>

                <!-- Add a submit button -->
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
