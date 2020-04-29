<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Testing\File;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUploadFile()
    {
        $file = tmpfile();
        $rowsNum = $this->faker->numberBetween(10,15);
        $colsNum = 50;
        for ($r = 0; $r < $rowsNum; $r++) {
            $team_id = $this->faker->numberBetween(0, 100);
            $phone = $this->faker->phoneNumber;
            if ($r === 0) {
                $team_id = 'Test Team ID';
                $phone = 'Phone';
            }
            $fields = [$team_id, $phone];
            for ($c = 2; $c < $colsNum; $c++) {
                $fields[$c] = $this->faker->word;
            }
            fputcsv($file, $fields);
        }
        fseek($file, 0);
        $import = new File('example.csv', $file);
        $mapping = ['Test Team ID' => 'team_id', 'Phone' => 'phone'];

        $this
            ->post('/api/upload-file', compact('import'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'fieldsFromFile',
                'fieldsToChoose'
            ]);
    }
}
