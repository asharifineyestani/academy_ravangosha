<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Book::query();

        if ($request->has('category_id') && $request->input('category_id') !== "All") {
            $query = $query->where('category_id', $request->input('category_id'));
        }

        // فیلتر بر اساس نویسنده
        if ($request->has('author_id') && $request->input('author_id') !== "All") {
            $query = $query->where('author_id', $request->input('author_id'));
        }

        // افزودن pagination
        $perPage = $request->input('per', 24); // تعداد آیتم‌ها در هر صفحه، در اینجا به عنوان مثال 10 تنظیم شده است
        $books = $query->paginate($perPage);

        // اضافه کردن پارامترهای URL به لینک‌های pagination
        $books->appends($request->only(['category_id', 'author_id', 'per']));

        return view('public_tv.books.index')->with([
            'books' => $books
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
        return view('public_tv.books.show')->with([
            'book' => Book::query()->where('slug',$slug)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
