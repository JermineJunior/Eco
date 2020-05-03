<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTes extends TestCase
{
   use RefreshDatabase;
  
   /** @test */
   public function it_has_a_path()
   {
      $product = factory('App\Product')->create();
      
      $response = $this->assertEquals('products/'.$product->id,$product->path());
   }
}
