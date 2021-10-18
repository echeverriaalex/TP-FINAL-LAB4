<?php namespace Views;?>

<div class="sign-in">
  <div class="container col-3 ">
    <div class="row align-items-center mt-5">

      <form action="<?= FRONT_ROOT ?>Student/login" method="post">
        <div class="mb-3 col-auto-center ">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="row g-3 align-items">
          <div class="col-auto-center">
            <label for="inputPassword6" class="col-form-label-center">Password</label>
          </div>
          <div class="col-auto-center">
              <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
          </div>
          <div class="col-auto-center">
            <span id="passwordHelpInline" class="form-text">
              Must be 8-20 characters long.
            </span>
          </div>
      </div>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
      </form>

    <div>
  

  </div>
<div>



