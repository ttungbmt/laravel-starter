<?php
namespace ttungbmt\Livewire\Table\Actions;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;

class Export {
    protected $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function collection()
    {
        return new Collection($this->items);
    }

    /**
     * @return array
     */
    public function registerEvents(): array {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
//                $cellRange = 'A1:W1'; // All headers
//                $heading = $event->sheet
//                    ->getDelegate()->getStyle($cellRange);
//
//                $heading->getFont()->setSize(14);
//
//                $heading->applyFromArray([
//                    'font' => [
//                        'bold' => true
//                    ],
//                ]);
            },
        ];
    }
}