<?php
namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemExport implements FromCollection
{
    public function collection()
    {
        return Item::all();
    }
}