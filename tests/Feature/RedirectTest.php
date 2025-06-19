<?php

namespace Step2dev\LazySeoTools\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Step2dev\LazySeoTools\Models\SeoRedirect;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_handles_redirect_properly()
    {
        SeoRedirect::create([
            'old_url' => 'old-page',
            'new_url' => 'new-page',
            'status_code' => 301,
        ]);

        $response = $this->get('/old-page');

        $response->assertRedirect('/new-page');
    }
}
