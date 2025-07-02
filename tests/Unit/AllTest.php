<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class AllTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //REGISTER AS ADMIN//

    // public function test_tc_register_001(){
    //     $admin = $this->post('/register',[
    //         'user_id' => '1',
    //         'nim' => '2041720096',
    //         'name' => 'Iqshan',
    //         'email' => '2041720096@student.polinema.ac.id',
    //         'password' => '12345678',
    //         'setLevel' => '1',
    //         'setStatus' => '1',
    //     ]);
    //     $user = $this->post('/register',[
    //         'user_id' => '2',
    //         'nim' => '2041720097',
    //         'name' => 'Bagus',
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => '12345678',
    //     ]);
    //     $seller = $this->post('/register',[
    //         'user_id' => '3',
    //         'nim' => '2041720098',
    //         'name' => 'Prasetyo',
    //         'email' => '2041720098@student.polinema.ac.id',
    //         'password' => '12345678',
    //     ]);

    //     $this->assertTrue(true);

    // }
    // public function test_tc_register_002(){
    //     $response = $this->post('/register',[
    //         'nim' => '2041720098',
    //         'name' => 'Bagus',
    //         'email' => '2041720096@student.polinema.ac.id',
    //         'password' => '12345678'
    //     ]);

    //     $response->assertRedirect('/');
    // }
    // public function test_tc_register_003(){
    //     $response = $this->post('/register',[
    //         'nim' => '2041720099',
    //         'name' => 'Prasetyo',
    //         'email' => '2041720096@student.ac.id',
    //         'password' => '12345678'
    //     ]);

    //     $response->assertRedirect('/');
    // }
    // public function test_tc_register_004(){
    //     $response = $this->post('/register',[
    //         'nim' => '2041720091',
    //         'name' => 'Iqshan',
    //         'email' => '2041720096@student.ac.id',
    //         'password' => '12345678'
    //     ]);
        
    //     $response->assertRedirect('/');
    // }
    
    //LOGIN AS ADMIN//

    // public function test_tc_login_001(){
    //     $response = $this->post('/login',[
    //         'email' => '2041720096@student.polinema.ac.id',
    //         'password' => '12345678'
    //     ]);
    //     $response->assertStatus(302);
    // }
    // public function test_tc_login_002(){
    //     $response = $this->post('/login',[
    //         'email' => '2041720096',
    //         'password' => '12345678'
    //     ]);

    //     $response->assertRedirect('/');
    // }
    // public function test_tc_login_003(){
    //     $response = $this->post('/login',[
    //         'email' => '2041720096@student.polinema.ac.id',
    //         'password' => '1234567'
    //     ]);

    //     $response->assertRedirect('/');
    // }
    // public function test_tc_login_004(){
    //     $response = $this->post('/login',[
    //         'email' => '2041720097',
    //         'password' => '1234567'
    //     ]);

    //     $response->assertRedirect('/');
    // }

    //PROFILE//

    public function test_tc_profile_001(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->put(route('profile.update'),[
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'notelp' =>'081139123812',
        ]);
        $response->assertStatus(302);
    }
    public function test_tc_profile_002(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->put(route('profile.update'),[
            'name' => auth()->user()->name,
            'email' => '2041720097@student.polinema.ac.id',
            'notelp' =>'1',
        ]);
        $response->assertStatus(500);
    }
    public function test_tc_profile_003(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->put(route('profile.update'),[
            'name' => 'bagus',
            'email' => auth()->user()->email,
            'notelp' =>'2',
        ]);
        $response->assertStatus(500);
    }
    public function test_tc_profile_004(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->put(route('profile.update'),[
            'name' => 'bagus',
            'email' => '2041720097@student.polinema.ac.id',
            'notelp' =>'3',
        ]);
        $response->assertStatus(500);
    }

    //PASSWORD//

    // public function test_tc_password_001(){
    //     $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => '12345678',
    //     ]);
    //     $this->put(route('profile.password'),[
    //         'old_password' => '12345678',
    //         'password' => '12345678',
    //         'password_confirmation' =>'12345678',
    //     ]);
    //     $response =  $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtest',
    //     ]);
    //     $response->assertStatus(302);
    // }
    // public function test_tc_password_002(){
    //     $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtest',
    //     ]);
    //     $this->put(route('profile.password'),[
    //         'old_password' => 'testtesttest',
    //         'password' => 'testtest',
    //         'password_confirmation' =>'testtest',
    //     ]);
    //     $response =  $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtest',
    //     ]);
    //     $response->assertStatus(302);
    // }
    // public function test_tc_password_003(){
    //     $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtest',
    //     ]);
    //     $this->put(route('profile.password'),[
    //         'old_password' => 'testtest',
    //         'password' => 'testtest',
    //         'password_confirmation' =>'testtesttest',
    //     ]);
    //     $response =  $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtest',
    //     ]);
    //     $response->assertStatus(302);
    // }
    // public function test_tc_password_004(){
    //     $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtest',
    //     ]);
    //     $this->put(route('profile.password'),[
    //         'old_password' => 'testtest',
    //         'password' => 'testtest',
    //         'password_confirmation' =>'testtesttest',
    //     ]);
    //     $response =  $this->post('/login',[
    //         'email' => '2041720097@student.polinema.ac.id',
    //         'password' => 'testtesttest',
    //     ]);
    //     $response->assertStatus(302);
    // }

    //CONTACT US//

    public function test_tc_contact_001(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/addContact',[
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'subject' =>'subject',
            'message' => 'message'
        ]);
        $response->assertStatus(302);
    }
    public function test_tc_contact_002(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/addContact',[
            'name' => auth()->user()->name,
            'email' => '',
            'subject' =>'subject',
            'message' => 'testfail'
        ]);
        $response->assertStatus(302);
    }
    public function test_tc_contact_003(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/addContact',[
            'name' => '',
            'email' => auth()->user()->email,
            'subject' =>'subject',
            'message' => 'testfail'
        ]);
        $response->assertStatus(302);
    }
    public function test_tc_contact_004(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/addContact',[
            'name' => '',
            'email' => '',
            'subject' =>'subject',
            'message' => 'testfail'
        ]);
        $response->assertStatus(302);
    }
    
    //CATEGORY//

    public function test_tc_category_001(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/addCategory',[
            'category_id' => '1',
            'category_name' => 'required'
        ]);
        $response->assertStatus(302);
    }
    public function test_tc_category_002(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->delete(route('category.categoryDestroy',1));
        $response->assertStatus(302);
    }

    //APPROVAL//

    public function test_tc_approval_002(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->get('/updateStatus/2041720098');
        $response->assertStatus(302);
    }
    public function test_tc_approval_003(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->get('/updateSeller/2041720098');
        $response->assertStatus(302);
    }

    //TESTIMONIALS//

    public function test_tc_testimonials_001(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/userTestimonials',[
            'user_id' => auth()->user()->user_id,
            'testimonials' => '2041720096@student.polinema.ac.id',
        ]);
        $response->assertStatus(302);
    }

    //CHAT//

    public function test_tc_message_001(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->post('/messages',[
            'to_user_id' => '2',
            'from_user_id' => auth()->user()->user_id,
            'message' =>'php unit',
        ]);
        $response->assertStatus(302);
    }

    //SETTING//

    public function test_tc_setting_001(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->get('/updateStatus/2041720097');
        $response->assertStatus(302);
    }
    public function test_tc_setting_002(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->get('/updateSeller/2041720098');
        $response->assertStatus(302);
    }
    public function test_tc_setting_003(){
        $this->post('/login',[
            'email' => '2041720096@student.polinema.ac.id',
            'password' => '12345678'
        ]);
        $response = $this->get('/updateLevel/2041720098');
        $response->assertStatus(302);
    }
}
