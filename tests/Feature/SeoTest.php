<?php

namespace Step2dev\LazySeoTools\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Step2dev\LazySeoTools\Models\Seo;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_seo_entry()
    {
        $seo = Seo::create([
            'title' => 'Test',
            'description' => 'Test desc',
            'keywords' => 'one, two, three',
            'seoable_type' => 'App\\Models\\Page',
            'seoable_id' => 1,
        ]);

        $this->assertDatabaseHas('seo', ['title' => 'Test']);
    }
}
