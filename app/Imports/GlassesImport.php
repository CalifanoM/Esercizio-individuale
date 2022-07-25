<?php

namespace App\Imports;

use App\Models\Glasses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GlassesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Glasses([
            'price' => $row['price'],
            'id_employee' => $row['id_employee'],
            'id_category' => $row['id_category'],
            'id_color' => $row['id_color'],
            'id_type'=> $row['id_type'],
            'id_brand' => $row['id_brand'],
        ]);
    }
}
