<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

use Spatie\LaravelPdf\Facades\Pdf;


class Contacts extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $q;
    public $perPage=5;

    #[Computed]
    public function contacts() 
    {
        if(!$this->q) {
            return Contact::simplePaginate($this->perPage);
        }else {
            return Contact::where('name', 'like', '%'.$this->q.'%')
                            ->orWhere('email', 'like', '%'.$this->q.'%')
                            ->orWhere('gender', 'like', '%'.$this->q.'%')
                            ->simplePaginate($this->perPage);
        }
    }

    public function render()
    {

        return view('livewire.contacts');
    }

    public function updatedQ()
    {
        $this->resetPage();
    }


    public function exportCSV()
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=export.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $list = Contact::all()->toArray();

        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }

    // public function exportPDF()
    // {
    //     $data = Contact::all(); // Corrected model name
    //     $data = mb_convert_encoding($data, 'UTF-8', 'UTF-8');


    //     $pdf = Pdf::loadView('myPDF', compact('data'));
    //     // $pdf = Pdf::loadView('pdf.invoice', $data);
    //     return $pdf->download('export.pdf');
    // }


    public function exportPDF()
    {
        $data = Contact::all()->toArray(); // Convert the collection to an array

            // Define a unique file name
        $fileName = 'export_' . time() . '.pdf';

        // Define the full file path
        $filePath = storage_path('app/public/' . $fileName);
        
        $pdf = Pdf::view('myPDF', ['data' => $data])
        ->format('A4')
        ->save($filePath);

            return response()->download($filePath);
        }
    

}
