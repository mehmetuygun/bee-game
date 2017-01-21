<?php

namespace MehmetUygun\BeeGame\Model;

interface BeeInterface
{
	public function getLife();
	public function getLifeSpan();
	public function getHitPoint();
	public function subHitPoint();
	public function isDead();
}
