<?php

namespace App\Imports;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Item;
use DB;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ItemImport implements ToModel,WithStartRow,WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Item([
            'name' => $row[0],
            'price' => $row[1],
        ]);
   
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
