<?php

namespace Tests\Unit;

use App\Product;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

  /** @test */
  public function name()
  {
        $this->assertEquals(Product::class,'App\Product');
  }
}
