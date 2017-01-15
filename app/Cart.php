<?php

namespace SmartStore;

//use SmartStore\Product;

use Session;

class Cart
{
    
	public $items = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;
	//public $oldcart = null;


	public function __construct($oldcart)
	{

		if ($oldcart){
			//$this->oldcart = $oldcart;
			$this->items = $oldcart->items;
			$this->totalQuantity = $oldcart->totalQuantity;
			$this->totalPrice = $oldcart->totalPrice;
		}

	}


	public function add($item, $id)
	{

		$storedItem = [ 'quantity' => 1, 'price' => $item->price, 'item' => $item ];

		if ($this->items){

			if (array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['price'] = $item->price * $storedItem['quantity'];
		$this->items[$id] = $storedItem;
		$this->totalQuantity = count($this->items);
		$this->totalPrice += $item->price;
	}


	public function update($item, $quantity)
	{

		$storedItem = [ 'quantity' => $quantity, 'price' => $item->price, 'item' => $item ];


		$storedItem['price'] = $item->price * $storedItem['quantity'];
		$this->items[$item->id] = $storedItem;

		if( $this->items[$item->id]['quantity'] <= 0 ){

			unset($this->items[$item->id]);
		}


		$ids = []; 

		foreach($this->items as $item){
			$ids[] = $item['price'];
		}

		$this->totalPrice =  array_sum($ids);
		$this->totalQuantity = count($this->items);
	}


}
