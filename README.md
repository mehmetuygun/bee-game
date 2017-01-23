[![Build Status](https://travis-ci.org/mehmetuygun/bee-game.svg?branch=master)](https://travis-ci.org/mehmetuygun/bee-game)

# bee-game

There are 3 bees which are that queen, worker, and drone. All of them has different amount of life, lifespan, and hit point.

QUEEN has
  1 life
  100 life span
  8 hit point

WORKER has
  5 life
  75 life span
  10 hit point

Drone hase
  8 life
  50 life span
  12 hit point
  
  In each round, one of bee must be hit by player the selection of which bee will be get hit is made by application as randomly.
  
  If queen be is dead, the game is over.
  If all bees are dead, the game is over too.
  
  Each turn the round increases by 1 
  
  Screenshot of game
  
  ![Alt text](  https://s29.postimg.org/z0g1webhj/bee_game.jpg "bee-game")

# Getting started

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
// Set random generator to hit bee randomly 
$Game->setRandomGenerator(new MehmetUygun\BeeGame\RandomGenerator);
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
# License
