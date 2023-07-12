<?php

namespace App\Imports;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
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
        //item
        $item = [];
        $item['name_ar'] = $row[0];
        $item['name_en'] = $row[1];
        $item['description_ar'] = $row[2];
        $item['description_en'] = $row[3];
        $item['currency_ar'] = $row[4];
        $item['currency_en'] = $row[5];
        $item['status'] = $row[6];
        $item['price'] = $row[7];
        $item['kcal'] = $row[8];
        $item['offer_id'] = $row[9];
        $item['brand_id'] = $row[10];
        $item['menu_category_id'] = $row[11];
        $item['order'] = $row[12];

        $item_id = DB::table('items')->insert($item);

        //extra
        $extra = [];
        $extra['name_ar'] = $row[13]; 
        $extra['name_en'] = $row[14]; 
        $extra['type'] = $row[15]; 
        $extra['brand_id'] = $row[16]; 
        $extra['status'] = $row[17]; 

        $extra_id = DB::table('extras')->insert($extra);

        //allergen
        $allergen = [];
        $allergen['name_ar'] = $row[18]; 
        $allergen['name_en'] = $row[19]; 
        $allergen['brand_id'] = $row[20]; 
        $allergen['status'] = $row[21]; 

        $allergen_id = DB::table('allergens')->insert($allergen);

        //items_extras
        $items_extra = [];
        $items_extra['currency_ar'] = $row[22]; 
        $items_extra['currency_en'] = $row[23]; 
        $items_extra['price'] = $row[24]; 
        $items_extra['extra_id'] = $row[25]; 
        $items_extra['item_id'] = $row[26]; 
        $items_extra['brand_id'] = $row[27]; 

        DB::table('items_extras')->insert($items_extra);

        //items_allergens
        $items_allergen = [];
        $items_allergen['allergen_id'] = $row[28]; 
        $items_allergen['item_id'] = $row[29]; 
        $items_allergen['unit'] = $row[30]; 
        $items_allergen['unit_category'] = $row[31]; 
        $items_allergen['brand_id'] = $row[32]; 

        DB::table('items_allergens')->insert($items_allergen);

    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
