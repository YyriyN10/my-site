<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>



<!-- FormModal -->
<div class="modal form-modal" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Write to us</h4>
        <p>We will contact you in a way convenient for you at a time convenient for you</p>
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.31 122.876" enable-background="new 0 0 121.31 122.876" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M90.914,5.296c6.927-7.034,18.188-7.065,25.154-0.068 c6.961,6.995,6.991,18.369,0.068,25.397L85.743,61.452l30.425,30.855c6.866,6.978,6.773,18.28-0.208,25.247 c-6.983,6.964-18.21,6.946-25.074-0.031L60.669,86.881L30.395,117.58c-6.927,7.034-18.188,7.065-25.154,0.068 c-6.961-6.995-6.992-18.369-0.068-25.397l30.393-30.827L5.142,30.568c-6.867-6.978-6.773-18.28,0.208-25.247 c6.983-6.963,18.21-6.946,25.074,0.031l30.217,30.643L90.914,5.296L90.914,5.296z"/></g></svg>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" placeholder="Enter your your phone number">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter your email">
          </div>
          <div class="form-group textarea-group">
            <textarea name="massage" class="form-control" placeholder="Enter your massage"></textarea>
          </div>
          <div class="time-to-call">
            <p>Choose a convenient time for the call</p>
            <div class="time-list">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input">
                  <span>9 PM - 10 PM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>10 PM - 11 PM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>11 PM - 12 PM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>12 PM - 1 AM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>1 AM - 2 AM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>2 AM - 3 AM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>3 AM - 4 AM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input" >
                  <span>4 AM - 5 AM</span>
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="call-time" class="form-check-input">
                  <span>5 AM - 6 AM</span>
                </label>
              </div>
            </div>
          </div>
          <button type="submit" class="button">send a message</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal video-modal" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.31 122.876" enable-background="new 0 0 121.31 122.876" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M90.914,5.296c6.927-7.034,18.188-7.065,25.154-0.068 c6.961,6.995,6.991,18.369,0.068,25.397L85.743,61.452l30.425,30.855c6.866,6.978,6.773,18.28-0.208,25.247 c-6.983,6.964-18.21,6.946-25.074-0.031L60.669,86.881L30.395,117.58c-6.927,7.034-18.188,7.065-25.154,0.068 c-6.961-6.995-6.992-18.369-0.068-25.397l30.393-30.827L5.142,30.568c-6.867-6.978-6.773-18.28,0.208-25.247 c6.983-6.963,18.21-6.946,25.074,0.031l30.217,30.643L90.914,5.296L90.914,5.296z"/></g></svg>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <video src="" autoplay muted controls></video>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal about-modal" id="tourModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 121.31 122.876" enable-background="new 0 0 121.31 122.876" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M90.914,5.296c6.927-7.034,18.188-7.065,25.154-0.068 c6.961,6.995,6.991,18.369,0.068,25.397L85.743,61.452l30.425,30.855c6.866,6.978,6.773,18.28-0.208,25.247 c-6.983,6.964-18.21,6.946-25.074-0.031L60.669,86.881L30.395,117.58c-6.927,7.034-18.188,7.065-25.154,0.068 c-6.961-6.995-6.992-18.369-0.068-25.397l30.393-30.827L5.142,30.568c-6.867-6.978-6.773-18.28,0.208-25.247 c6.983-6.963,18.21-6.946,25.074,0.031l30.217,30.643L90.914,5.296L90.914,5.296z"/></g></svg>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>