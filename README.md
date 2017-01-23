[![Build Status](https://travis-ci.org/mehmetuygun/bee-game.svg?branch=master)](https://travis-ci.org/mehmetuygun/bee-game)

# Bee-Game

You have initially 1 queen bee, 5 worker bee, and 8 drone bee. 

# Rules

Every bee has life span, hit point, and life. Initially, the following properties are predefined.

  Queen has 100 life span, and 8 hit point.
  Worker has 75 life span, and 10 hit point.
  Drone has 50 life span, and 12 hit point.
  
+ **Rule 1:** If all bees are dead, the game will be over.
+ **Rule 2:** If Queen bee is dead, the game will be over automatically
+ **Rule 3:** If the life span of bee gets hit, the hit point will be removed from life span
+ **Rule 4:** If the life span happens 0 or under it, the 1 life will be removed from life of bee
+ **Rule 5:** If the life happens 0, the bee will be dead and removed.

# How it works

When hit function works the randomly or pre-selected bee gets hit. In this, I used a button to make possible to hit a bee randomly. The hit point will be removed from life span of randomly or preselected bee. And when all bee or queen bee is dead, the game will be over.

# Requirement

+ PHP >=5.5

# Usage

```php
// Start new game
$Game = new Game()
```

```php
// Create a new queen bee
$Queen = new Queen();
```

```php
// Create a new worker bee
$Queen = new Queen();
```

```php
// Create a new drone bee
$Worker = new Worker();
```

```php
// Add a bee into game
$Game->addBee($Queen);
$Game->addBee($Worker);
$Game->addBee($Drone);
```
```php
//If you are gonna use $Game->hitBee() in another page or after post or get method which the user can send the information to browser
//You should use simply session to store $Game before and after

// Set the game when it is loaded
$_SESSION["Game"] = serialize($Game);

// Get the game when it is needed
$Game = unserialize($_SESSION["Game"]);
```

```php
// Set random generator to hit bee randomly 
$Game->setRandomGenerator(new RandomGenerator);
```

```php
// Hit a bee which is selected before as randomly
$Game->hitBee();
```

```php
// Check game if it is over 
if ($Game->isOver()) {
  // Display new bee info
  
  // For displaying new bee info, simply use following steps. Do not forget to use the right bee name as following
  $Game->getBee('Queen')->getLife();
  $Game->getBee('Worker')->getLifeSpan();
  $Game->getBee('Drone')->getHitPoint();
}
```
# Screen shot
  ![Bee-Game](https://s29.postimg.org/yfl7wy6zb/game_screen_shot.png)
  
# License

  Bee-Game is licensed under the MIT License.

  Copyright 2017 
  [Mehmet Uygun](https://www.linkedin.com/in/mehmet-uygun "Linkedin Account")

  
