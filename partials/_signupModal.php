

<!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:30px; padding: 10px;">
          <div class="modal-header">
            <h5 class="modal-title fw-bold" id="signupModal">Signup</h5>
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" style="background-color: #a3a3a3; border: none; border-radius:10px; padding: 8px 8px 3px 8px;">
              <span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleSignup.php" method="post">
              <div class="form-group">
                  <b><label for="username">Username</label></b>
                  <input class="form-control input-field" id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-group">
                <b><label for="firstName">First Name</label></b>
                <input type="text" class="form-control input-field" id="firstName" name="firstName" placeholder="First Name" required>
              </div>
              <div class="form-group">
                <b><label for="lastName">Last name</label></b>
                <input type="text" class="form-control input-field" id="lastName" name="lastName" placeholder="Last name" required>
              </div>
              <div class="form-group my-3">
                  <b><label for="email">Email</label></b>
                  <input type="email" class="form-control input-field" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              <div class="form-group">
                <b><label for="phone">Phone No</label></b>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon" style="padding: 10px; border-radius: 20px 0px 0px 20px">+92</span>
                  </div>
                  <input type="tel" class="form-control input-field" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="text-left">
                  <b><label for="password">Password</label></b>
                  <input class="form-control input-field" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21">
              </div>
              <div class="text-left">
                  <b><label for="password1">Confirm Password</label></b>
                  <input class="form-control input-field" id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" required minlength="4" maxlength="21">
              </div>
              <button type="submit" class="input-field w-100 text-white fw-bold my-2" style="background-color: rgb(101, 54, 0);">Signup</button>
            </form>
            <p class="mb-0 mt-1 text-center">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a></p>
          </div>
        </div>
      </div>
    </div>
