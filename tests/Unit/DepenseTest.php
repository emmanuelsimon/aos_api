<?php

namespace Tests\Unit;

use App\Models\Depense;
use PHPUnit\Framework\TestCase;

class DepenseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testUn()
    {
        $depense = new Depense();
        $depense->libelle = 'libelle';
        $depense->observation = 'observation';

        $this->assertEquals('observation', $depense->observation, 'test_obs');
        $this->assertEquals('libelle', $depense->libelle, 'test_libel');
    }
}
