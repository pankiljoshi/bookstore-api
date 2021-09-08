<?php

namespace App\Http\Controllers\Shopify;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\SaveBook;
use App\Services\Shopify\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

    public function list(Product $product, Request $request): JsonResponse
    {
        $response = [];
        $response['books'] = collect($product->list(['limit' => $request->input('limit', 4), 'since_id' => $request->input('since_id', 0)]))->map(function ($book) {
            $book_meta = Book::select('no_of_pages', 'author', 'wholesale_price')->where('shopify_product_id', $book['id'])->first();
            if ($book_meta) {
                $book = array_merge($book, $book_meta->toArray());
            }
            return $book;
        });

        $response['total_count'] = $product->count();

        return response()->json($response);
    }

    public function retrive(int $id, Product $product): JsonResponse
    {
        $book = $product->retrive($id);

        $book_meta = Book::where('shopify_product_id', $id)->first();

        if ($book_meta) {
            $book = array_merge($book, $book_meta->toArray());
        }

        return response()->json($book);
    }

    public function saveMeta(int $id, SaveBook $request, Product $product): JsonResponse
    {
        $product->retrive($id);

        $book_meta = Book::updateOrCreate(['shopify_product_id' => $id], $request->validated());

        return response()->json($book_meta);
    }
}
