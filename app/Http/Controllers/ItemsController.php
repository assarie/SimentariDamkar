<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all();
        return view('partials.barang', ['items' => $items]);
    }

    public function checkQRCode(Request $request)
    {
        $qrCode = $request->input('qr_code');
        $exists = Items::where('qr_code', $qrCode)->exists();
        return response()->json(['exists' => $exists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('partials.tambahbarang');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'desc' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'qr_code_image' => 'required|string',
        'qr_code_text' => 'required|string',
    ]);

   // Jika gambar tidak diupload, kembalikan dengan error
   if (!$request->hasFile('image')) {
    return back()->withErrors(['image' => 'Harap Masukkan Gambar!'])->withInput();
}

    $image = $request->file('image');
    $image_name = null;
    if ($image) {
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $image_name);
    }

    // Save QR code image
    $qr_code_image = $request->qr_code_image;
    $qr_image_name = 'qr_' . time() . '.png';
    $qr_image_path = public_path('uploads/' . $qr_image_name);
    $qr_code_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $qr_code_image));
    File::put($qr_image_path, $qr_code_data);

    Items::create([
        'name' => $request->name,
        'description' => $request->desc,
        'image' => $image_name ? 'uploads/' . $image_name : null,
        'qr_code' => $request->qr_code_text,
        'qr_path' => 'uploads/' . $qr_image_name,
    ]);

 
    return redirect()->route('barang')->with('success', 'Barang berhasil ditambahkan');
}
    

    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $items)
    {
        $items = Items::findOrFail($items->id);

        return view('partials.editbarang', ['items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the item by ID
        $item = Items::findOrFail($id);

        // Update the item with the validated data
        $item->name = $request->input('name');
        $item->description = $request->input('desc');

        if ($request->hasFile('image')) {
            // Handle file upload manually
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);

            // Delete old image if needed
            if ($item->image && file_exists(public_path('uploads/' . $item->image))) {
                unlink(public_path('uploads/' . $item->image));
            }

            // Update the item with the new image name
            $item->image = 'uploads/' . $image_name;
        }

        // Save the updated item
        $item->save();

        // Redirect or return response
        return redirect()->route('barang')->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Items::findOrFail($id);
        Storage::delete('public/uploads/' . $item->image);
        Storage::delete('public/uploads/'.$item->qr_path);
        $item->delete();

        return redirect()->route('barang')->with('success', 'Barang berhasil dihapus');
    }

    public function printqr(Request $request, $id)
    {
        $item = Items::findOrFail($id);
        $infos = $request->only(['size', 'quantity']);

        // Generate the print view with the provided size and quantity
        return view('print.qr', ['item' => $item, 'infos' => $infos]);
    }

   
}
