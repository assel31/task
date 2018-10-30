<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class InvoiceController extends Controller
{
    public function create()
    {
        $this->validate(request(), [
            'number' => 'required',
            'invoice_date' => 'required',
            'supply_date' =>'required',
            'comment' => 'required'
        ]);

        Invoice::create([
            'number' => request('number'),
            'invoice_date' => request('invoice_date'),
            'supply_date' => request('supply_date'),
            'comment' => request('comment')
        ]);

        return back();
    }

    public function update($id)
    {
        $this->validate(request(), [
            'number' => 'required',
            'invoice_date' => 'required',
            'supply_date' =>'required',
            'comment' => 'required'
        ]);

        Invoice::find($id)->update([
            'number' => request('number'),
            'invoice_date' => request('invoice_date'),
            'supply_date' => request('supply_date'),
            'comment' => request('comment')
        ]);

        return back();
    }

    public function remove($id)
    {
        Invoice::find($id)->delete();
        return back();
    }
}
