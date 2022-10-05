<?php

namespace App\ViewModels;

use App\Models\Entity;

class EntitiesViewModel
{
	/**
	 * @var Entity[]
	 */
	public array $items;


	/**
	 * @param Entity[] $items
	 */
	public function __construct(array $items)
	{
		$this->items = $items;
	}
}