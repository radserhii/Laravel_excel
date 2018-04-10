<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Excel;

class DocumentController extends Controller
{
    public function index() {
        return view('index');
    }

    public function import(Request $request) {
        $this->validate($request, array(
            'file' => 'required'
        ));

        if($request->hasFile('file')){

            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){

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

                    dd($insert);

                    if(!empty($insert)){

                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls file..!!');
                return back();
            }
        }

    }
}
