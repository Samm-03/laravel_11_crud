<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 /**
 * Display a listing of the resource.
 */
 public function index() : View
 {
 return view('products.index', [
 'products' => Product::latest()->paginate(4)
 ]);
 }
 /**
 * Show the form for creating a new resource.
 */
 public function create() : View
 {
 return view('products.create');
 }
 /**
 * Store a newly created resource in storage.
 */
public function store(StoreProductRequest $request): RedirectResponse
{
    // Get all validated data from the form request
    $data = $request->validated();

    // If an image is uploaded, store it in storage/app/public/product_images
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('product_images', 'public');
        $data['image'] = $imagePath;
    }

    // Create the product with the data (including image path)
    Product::create($data);

    return redirect()->route('products.index')
        ->withSuccess('New product is added successfully.');
}

 /**
 * Display the specified resource.
 */
 public function show(Product $product) : View
 {
 return view('products.show', compact('product'));
 }
 /**
 * Show the form for editing the specified resource.
 */
 public function edit(Product $product) : View
 {
 return view('products.edit', compact('product'));
 }
 /**
 * Update the specified resource in storage.
 */
public function update(UpdateProductRequest $request, Product $product): RedirectResponse
{
    // Get all validated data from the request
    $data = $request->validated();

    // Check if a new image has been uploaded
    if ($request->hasFile('image')) {
        // Delete the old image from storage if it exists
        if ($product->image) {
            Storage::disk('public')->delete('product_images/' . $product->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('product_images', 'public');
        $data['image'] = basename($imagePath);  // Store only the image filename in the database
    }

    // Update the product with the new data (including image if uploaded)
    $product->update($data);

    // Return with a success message
    return redirect()->route('products.index')
        ->withSuccess('Product is updated successfully.');
}


 /**
 * Remove the specified resource from storage.
 */
 public function destroy(Product $product) : RedirectResponse
 {
 $product->delete();
 return redirect()->route('products.index')
 ->withSuccess('Product is deleted successfully.');
 }
}
