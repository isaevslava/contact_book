<?php

namespace Tests\Unit;

use App\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic model unit test.
     *
     * @return void
     */
    public function testInstanceOfContact()
    {
        $this->assertInstanceOf(Contact::class, new Contact());
    }
}
