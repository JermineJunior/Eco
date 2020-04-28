<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\{Admin,User,Product};
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
   
     /** @test*/
    public function only_admins_can_view_admin_dashboard()
    {
    
        $this->signIn();
   
        $response = $this->get('/admin')
                ->assertStatus(302);
    }

    /** @test */
    public function admins_can_view_admin_dash()
    {
        $admin = factory(Admin::class)->create();

        $response = $this->actingAs($admin, 'admin')
            ->get('/admin');

        $response->assertStatus(200);
    }

    /** @test */
    public function users_can_view_products()
    {
        $this->signIn();

        $product = factory(Product::class)->create();

        $response  = $this->get('/home')
               ->assertSee($product->title);
    }

    protected function signIn()
    {
        $this->actingAs(factory(User::class)->create());
    }

}
