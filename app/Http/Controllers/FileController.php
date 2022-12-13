<?php
namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ExcelSheet;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Shuchkin\SimpleXLSX;

class FileController extends Controller
{
    public function index()
    {
        $excelSheets = ExcelSheet::all();
        return view('files.index', ['excelSheets' => $excelSheets]);
    }

    public function view($id)
    {
        $excelSheet = ExcelSheet::find($id);
        $headers = $excelSheet->getHeaderIds();
        $contents = Content::whereIn('header_id', $headers)->orderBy('id', 'asc')
            ->get();
        return view('files.view', ['file' => $excelSheet, 'contents' => $contents]);
    }

    public function parseFile(Request $request)
    {
        $file = $request->file('file');
        if ($file)
        {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            // dd($extension); //xlsx
            $excel_file = ExcelSheet::create(['file_name' => $filename]);
            $location = 'uploads'; //Created an "uploads" folder for that
            $filepath = public_path($location . "/" . $filename);
            $header_ids = [];

            if ($extension == 'xlsx')
            {

                if ($xlsx = SimpleXLSX::parse($filepath))
                {
                    foreach ($xlsx->rows() as $index => $row)
                    {
                        if ($index == 0)
                        {
                            foreach ($row as $column)
                            {
                                $header = Header::create(['excel_sheet_id' => $excel_file->id, 'header_name' => $column]);
                                if ($header->save())
                                {
                                    array_push($header_ids, $header->id);
                                }
                            }
                        }
                        else
                        {
                            foreach ($row as $col_index => $column)
                            {
                                Content::create(['header_id' => $header_ids[$col_index], 'value' => $column]);
                            }
                        }
                    }
                    return redirect()->back()
                        ->with('message', 'File successfully uploaded');
                }
                else
                {
                    echo SimpleXLSX::parseError();
                }
            }
            else
            {
                return redirect()
                    ->back()
                    ->with('error', 'Only .xlsx file is supported');
            }
        }
    }
}
