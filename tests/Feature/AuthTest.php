<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\{Admin,User,Product};
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
   
     /** @test*/
    public function users_can_not_view_admin_dashboard()
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
    /** @test */
    public function admins_can_logout()
    {
        $this->signInAdmin();

        $response = $this->get('/admin/logout');

        $response = $this->get('/admin')
             ->assertStatus(302);

    }
    
        /** @test */
        public function users_can_logout()
        {
            $this->signIn();

            $response = $this->get('user/logout');
    
            $response = $this->get('/home')
                 ->assertStatus(302);
        }
    
    /** @test */
    public function logingout_users_dosnt_logout_admins()
    {
        $this->signIn();
        $this->signInAdmin();

        $response = $this->get('/user/logout');

        $response = $this->get('/admin')
             ->assertStatus(200);
    }


    /**  to sign in a user */
    protected function signIn()
    {
        $this->actingAs(factory(User::class)->create());
    }

    /** login admins */

    protected function signInAdmin()
    {
        $admin = factory(Admin::class)->create();

        $this->actingAs($admin, 'admin');
    }

}
