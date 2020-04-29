<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageAvailable()
    {
        $this
            ->get('/')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testImportPageAvailable()
    {
        $this
            ->get('/import')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testContactsPageAvailable()
    {
        $this
            ->get('/contacts')
            ->assertStatus(500);
    }
}
