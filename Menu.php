<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Menu</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styledm.css">
</head>
<body>
    <h1> Samgyup Bowl Menu </h1>
  <div class="container">
    <div class="menu">
      <h2 class="menu-group-heading">
        Meals
      </h2>
      <div class="menu-group">
        <div class="menu-item">
          <img class="menu-item-image" src="bibmbap.jpg" alt="bibimbap">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Bibimbap</span>
              <span class="menu-item-price">₱50.00</span>
            </h3>
            <p class="menu-item-description">
              Enjoy the iconic Korean Bibimbap in a cup that easily fills you up in a hearty way,
              with fresh ingredients and authentic Korean seasoning this meal surely give the feels.
            </p>
          </div>
        </div>
        <div class="menu-item">
          <img class="menu-item-image" src="pkimchi.jpg" alt="Pork Kimchi">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Pork Kimchi</span>
              <span class="menu-item-price">₱60.00</span>
            </h3>
            <p class="menu-item-description">
              This yummy cup offers the taste of Korean BBQ, by combining the somkey and savoury BBQ
              with fresh and a spicy kick from autthentic Kimchi.
            </p>
          </div>
        </div>
        <div class="menu-item">
          <img class="menu-item-image" src="bulgogi.jpg" alt="Bulgogi">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Bulgogi</span>
              <span class="menu-item-price">₱55.00</span>
            </h3>
            <p class="menu-item-description">
              A unique meal that blends many falvors and offers a new taste for everyone, With the
              iconic Bulgogi taste and Filipino spices, it surely is unique and appetizing.
            </p>
          </div>
        </div>
        <div class="menu-item">
          <img class="menu-item-image" src="kfchicken.jpg" alt="Korean Fried Chicken">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Korean Fried Chicken</span>
              <span class="menu-item-price">₱60.00</span>
            </h3>
            <p class="menu-item-description">
              The classic Korean Fried Chicken taste now in a cup, Enjoy the tangy and sticky sauce
              that wraps the chicken with flavor and surely gives that Korean kick.
            </p>
          </div>
        </div>
      </div>
      <h2 class="menu-group-heading">
        Drinks
      </h2>
      <div class="menu-group">
        <div class="menu-item">
          <img class="menu-item-image" src="mtea.jpg" alt="Milktea">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Milktea</span>
              <span class="menu-item-price">₱50.00</span>
            </h3>
            <p class="menu-item-description">
              Comes in different falvours, all at the same price!
              Wintermelon | Matcha | Cookies and Cream | Strawberry
            </p>
          </div>
        </div>
        <div class="menu-item">
          <img class="menu-item-image" src="coke.jpg" alt="Coke">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Coke</span>
              <span class="menu-item-price">₱25.00 | ₱45.00</span>
            </h3>
            <p class="menu-item-description">
              Swakto | Litro
            </p>
          </div>
        </div>
        <div class="menu-item">
            <img class="menu-item-image" src="lemon.jpg" alt="Lemonade">
            <div class="menu-item-text">
              <h3 class="menu-item-heading">
                <span class="menu-item-name">Lemonade</span>
                <span class="menu-item-price">₱45.00</span>
              </h3>
              <p class="menu-item-description">
                Enjoy the Sweet and tangy taste of Lemon.
              </p>
            </div>
          </div>
      </div>
      <h2 class="menu-group-heading">
        Add Ons
      </h2>
      <div class="menu-group">
        <div class="menu-item">
          <img class="menu-item-image" src="cheese.jpg" alt="Cheese">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Cheese</span>
              <span class="menu-item-price">₱10.00</span>
            </h3>
            <p class="menu-item-description">
              Add a creamy and savory flavor to any meals!
            </p>
          </div>
        </div>
        <div class="menu-item">
          <img class="menu-item-image" src="egg.jpg" alt="Egg">
          <div class="menu-item-text">
            <h3 class="menu-item-heading">
              <span class="menu-item-name">Egg</span>
              <span class="menu-item-price">₱15.00</span>
            </h3>
            <p class="menu-item-description">
              Add extra taste to any meals!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button type="button" onclick="window.location.href='dashboard.php'">
  	Back
</button>

</body>
</html>


