<?php

namespace App\Http\Controllers;

use App\Document;
use Excel;

class ExportController extends Controller
{
    /**
     * Provides the export xls/xlsx file from the database and downloads them
     */
    public function export()
    {
        $document = Document::all();

        $documentArray = [];

        //add header
        $documentArray[] = ['Фамимлия', 'Имя', 'Отчество', 'Год. рождения', 'Должность', 'Зп в год.'];

        foreach ($document as $value) {
            $valueArray = $value->toArray();
            array_shift($valueArray);
            $documentArray[] = $valueArray;
        }

        Excel::create('document', function($excel) use ($documentArray) {

            $excel->setTitle('Document');

            $excel->sheet('sheet1', function($sheet) use ($documentArray) {
                $sheet->fromArray($documentArray, null, 'A1', false, false);
            });

        })->download('xlsx');
    }
}
