<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\AgeGroups;

class ReadBaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testArrayData()
    {
        $groups = new AgeGroups;
        $this->assertTrue(count($groups->all()) === 10, 'Should have 10 groups' );
    }

    public function testLastElementShouldBeO60()
    {
        $groups = new AgeGroups;
        $age_groups = $groups->all();
        $this->assertEquals('Older than 60', array_pop($age_groups), 'Last age group should be older then 60');
    }
}
