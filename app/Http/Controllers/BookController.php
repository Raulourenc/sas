<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Database\QueryException;


class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }

    public function store(StoreBookRequest $request)
    {  
        $book = Book::create($request->validated());

        if ($book->fails()) {
            return response()->json(['error' => $book->errors()], 400);
        }

        return response()->json($book, 201);
    }

    public function update(UpdateBookRequest $request, Book $id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['message' => 'Book Not Found'], 404);
        }
        $book->update($request->validated());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['message' => 'Book Not Found'], 404);
        }
  
        $book->delete();
        return response()->json(null, 204);
    }
}
