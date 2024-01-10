<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:30px; padding: 10px;">
        <div class="modal-header">
            <h5 class="modal-title" id="checkoutModal">Enter Your Details</h5>
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" style="background-color: #a3a3a3; border: none; border-radius:10px; padding: 8px 8px 3px 8px;">
              <span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <form action="partials/_manageCart.php" method="post">
                <div class="form-group">
                    <b><label for="address">Address</label></b>
                    <input class="form-control input-field" id="address" name="address" placeholder="Tariq Rd, Block 3, PECHS, Karachi, Sindh 75400" type="text" required minlength="3" maxlength="500">
                </div>
                <div class="form-group">
                    <b><label for="address1">Nearest Landmark</label></b>
                    <input class="form-control input-field" id="address1" name="address1" placeholder="near Ridan Mandi" type="text">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="phone">Phone No</label></b>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="padding: 10px; border-radius: 20px 0px 0px 20px" id="basic-addon">+92</span>
                        </div>
                        <input type="tel" class="form-control input-field" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <b><label for="zipcode">Zip Code</label></b>
                        <input type="text" class="form-control input-field" id="zipcode" name="zipcode" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">                    
                    </div>
                </div>
                <div class="form-group">
                    <b><label for="password">Password</label></b>    
                    <input class="form-control input-field" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary input-field px-3" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="amount" value="<?php echo $totalPrice ?>">
                    <button type="submit" name="checkout" class="btn btn-success input-field px-3">Order</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>