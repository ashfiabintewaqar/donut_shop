  
<style>
  body {
    font-family: "poppins", sans-serif;
  }

  .input-field {
    border-radius: 30px;
    padding: 10px;
    margin-bottom: 10px;
  }

  label {
    margin-bottom: 6px;
  }

  .close-btn {
    background-color: #a3a3a3; 
    border: none; 
    border-radius:10px; 
    padding: 8px 8px 3px 8px;
  }
</style>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:30px; padding: 10px;">
          <div class="modal-header">
            <h5 class="modal-title fw-bold" id="loginModal">Login</h5>
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleLogin.php" method="post">
              <div class="text-left">
                  <b><label class="mb-1" for="username">Username</label></b>
                  <input class="form-control input-field" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
              </div>
              <div class="text-left">
                  <b><label class="mb-1" for="password">Password</label></b>
                  <input class="form-control input-field" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required>
              </div>
              <button type="submit" class="input-field w-100 text-white fw-bold my-2" style="background-color: rgb(101, 54, 0);">Login</button>
            </form>
            <p class="mb-0 mt-1 text-center">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up</a></p>
          </div>
        </div>
      </div>
    </div>

