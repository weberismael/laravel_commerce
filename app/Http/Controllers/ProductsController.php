<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {

        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    public function store(Requests\productRequest $request)
    {
        $input = $request->all();

        $product    = $this->productModel->fill($input);

        $product->save();

        return redirect()->route('products');

    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->productModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Requests\productRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image'); // pegar o arquivo
        $extension = $file->getClientOriginalExtension(); // pegar a extensão do arquivo

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);

    }
}
