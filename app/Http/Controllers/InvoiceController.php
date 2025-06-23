<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class InvoiceController extends Controller {
    public function get_all_invoice() {
        $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();

        return response()->json([
            'invoices' => $invoices,
        ], 200);
    }
    public function search_invoice(Request $request) {
        $search = $request->get('s');
        if ($search != null) {
            $invoices = Invoice::with('customer')
                ->where('id', $search)
                ->get();
            return response()->json([
                'invoices' => $invoices,
            ], 200);
        } else {
            return $this->get_all_invoice();
        }
    }

    public function createInvoice() {
        $counter = Counter::where('key', 'invoice')->first();
        // $random = Counter::where('key', 'invoice')->first();

        $invoice = Invoice::orderBy('id', 'DESC')->first();
        if ($invoice) {
            $invoice = $invoice->id + 1;
            $counters = $counter->value + $invoice;
        } else {
            $counter = $counter->value;
        }

        $formData = [
            'number' => $counter->prefix . $counters,
            'customer_id' => null,
            'customer' => null,
            'date' => date('Y-m-d'),
            'due_date' => null,
            'reference' => null,
            'discount' => 0,
            'term_and_condition' => 'Default term and condition',
            'item' => [
                'product_id' => null,
                'product' => null,
                'unit_price' => 0,
                'quantity' => 1,
            ]
        ];

        return response()->json($formData);
    }

    public function addInvoice(Request $request) {
        $invoiceItem = $request->input('invoice_item');

        $invoiceData['sub_total'] = $request->input('subtotal');
        $invoiceData['total'] = $request->input('grandtotal');
        $invoiceData['customer_id'] = $request->input('customer_id');
        $invoiceData['number'] = $request->input('number');
        $invoiceData['date'] = $request->input('date');
        $invoiceData['due_date'] = $request->input('due_date');
        $invoiceData['discount'] = $request->input('discount');
        $invoiceData['reference'] = $request->input('reference');
        $invoiceData['terms_and_conditions'] = $request->input('terms_and_conditions');


        $invoice = Invoice::create($invoiceData);

        foreach (json_decode($invoiceItem) as $item) {
            $itemdata['product_id'] = $item->id;
            $itemdata['invoice_id'] = $invoice->id;
            $itemdata['quantity'] = $item->quantity;
            $itemdata['unit_price'] = $item->unit_price;

            InvoiceItem::create($itemdata);
        }
        return response()->json(['success' => true, 'invoice_id' => $invoice->id], 201);
    }
    public function showInvoice($id) {
        $invoice = Invoice::with(['customer', 'invoice_items.product'])->find($id);
        return response()->json([
            'invoice' => $invoice,
        ], 200);
    }
    public function editInvoice($id) {
        $invoice = Invoice::with(['customer', 'invoice_items.product'])->find($id);
        return response()->json([
            'invoice' => $invoice,
        ], 200);
    }
    public function updateInvoice(Request $request, $id) {
        $invoice = Invoice::where('id', $id)->first();

        $invoice->sub_total =  $request->subtotal;
        $invoice->discount =  $request->discount;
        $invoice->total =  $request->grandtotal;
        $invoice->customer_id =  $request->customer_id;
        $invoice->number =  $request->number;
        $invoice->date =  $request->date;
        $invoice->due_date =  $request->due_date;
        $invoice->reference =  $request->reference;
        $invoice->terms_and_conditions =  $request->terms_and_conditions;

        $invoice->update();
        $invoiceItem = $request->input("invoice_item");
        $invoice->invoice_items()->delete();

        foreach (json_decode($invoiceItem) as $item) {
            $itemdata['product_id'] = isset($item->product_id) ? $item->product_id : $item->id;
            $itemdata['invoice_id'] = $invoice->id;
            $itemdata['quantity'] = $item->quantity;
            $itemdata['unit_price'] = $item->unit_price;
            InvoiceItem::create($itemdata);
        }
        return response()->json(['success' => true, 'invoice_id' => $invoice->id], 200);
    }
    public function deleteItem($id) {
        $invoiceItem = InvoiceItem::findOrFail($id);
        $invoiceItem->delete();
    }
    public function deleteInvoice($id) : void {
        $invoice = Invoice::findOrFail($id);
        $invoice->invoice_items()->delete();
        $invoice->delete();
        
    }
}
