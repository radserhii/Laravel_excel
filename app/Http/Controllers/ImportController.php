<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use File;
use Excel;

class ImportController extends Controller
{
    /**
     * Provides import xls/xlsx file to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        $this->validate($request, array(
            'file' => 'required'
        ));

        if ($request->hasFile('file')) {

            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                if (!empty($data) && $data->count()) {

                    foreach ($data as $key => $value) {

                        $insert[] = [
                            'first_name' => trim($value->famimliya),
                            'last_name' => trim($value->imya),
                            'patronymic' => trim($value->otchestvo),
                            'birth_year' => trim($value->god_rozhdeniya),
                            'position' => trim($value->dolzhnost),
                            'salary' => trim($value->zp_v_god)
                        ];
                    }

                    if (!empty($insert)) {

                        $insert = DB::table('documents')->insert($insert);

                        if ($insert) {
                            Session::flash('success', 'Your Data has successfully imported');
                        } else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            } else {
                Session::flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls file..!!');
                return back();
            }
        }

    }
}
