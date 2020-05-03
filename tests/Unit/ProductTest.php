<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\{Product,Cart};
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
   use RefreshDatabase;
  
   /** @test */
   public function it_has_a_path()
   {
      $product = factory('App\Product')->create();
      
      $response = $this->assertEquals('products/'.$product->id,$product->path());
   }
}
