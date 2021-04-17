<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;

class PageController extends Controller
{
    public function home()
    {
        return view('pages/home');
    }

    public function dompdf()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pages/dompdf'));
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function laravelexcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
