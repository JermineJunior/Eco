<?php

namespace Tests;
use App\{User,Admin};

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function create($class,$attr = [])
    {
      return factory($class,$attr)->create();
    }

    protected function make($class,$attr = [])
    {
      return factory($class,$attr)->make();
    }
}
