<?php

namespace App\Imports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Unit([
            'type_id' => $row['type'],
            'bak_id' => $row['bak'],
            'flag_id' => $row['flag'],
            'group_id' => $row['group'],
            'name' => $row['name'],
            'slug' => $row['slug'],
            'color' => $row['color'],
            'vin' => $row['vin'],
            'engine_numb' => $row['engine'],
            'year' => $row['year'],
            'fuel' => $row['fuel'],
            'cylinder' => $row['cylinder'],
        ]);
    }
}
