  
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

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:30px; padding: 10px;">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="searchModal">Search</h5>
        <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-xmark text-white fs-4"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="_handleSearch.php">
            <div class="text-left">
                <input class="form-control input-field" id="search" name="search" placeholder="Search products here..." type="text" required>
                <button type="submit" class="input-field w-100 text-white fw-bold my-2" style="background-color: rgb(101, 54, 0);">Search</button>
            </div>

            
          </form>
      </div>
    </div>
  </div>
</div>
