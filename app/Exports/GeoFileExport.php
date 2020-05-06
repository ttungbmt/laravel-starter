<?php

namespace App\Exports;

use App\GeoFile;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;

class GeoFileExport implements FromView {
    protected $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function collection() {
        return new Collection($this->items);
    }

    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => new Collection($this->items)
        ]);
    }

//    /**
//     * @return array
//     */
//    public function registerEvents(): array {
//        return [
//            AfterSheet::class => function (AfterSheet $event) {
//                $cellRange = 'A1:W1'; // All headers
//                $sheet = $event->sheet;
//
//                $heading = $sheet->getDelegate()->getStyle($cellRange);
//
//
//                $heading->getFont()->setSize(14);
//
//                $heading->applyFromArray([
//                    'fill' => [
//                        'type'  => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
//                        'color' => ['rgb' => 'e7781d']
//                    ],
//                    'font' => [
//                        'bold' => true
//                    ],
//                ]);
//
////                $sheet->setFontFamily('Arial');
//
//            },
//        ];
//    }
}