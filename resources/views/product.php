<main class="main px-4 px-lg-5 mt-5">
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?php
        echo $value['photo'] ?>" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="price"><span>$</span><span><?php
                  echo $value['price'] ?></span></p>
          <h5 class="card-title"><?php
              echo $value['name'] ?></h5>
          <p class="card-text">Description</p>
          <form class="cart">
            <div class="quantity">
              <label class="screen-reader-text">Quantity</label>
              <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="1"
                     placeholder=""
                     inputmode="numeric">
            </div>
            <p></p>
            <button type="submit" name="add-to-cart">Add to cart</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>