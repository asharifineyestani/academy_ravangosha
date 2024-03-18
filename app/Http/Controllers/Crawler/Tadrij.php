<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use App\Models\Category;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class Tadrij extends Controller
{

    public $categoryId;


    public function downloadImageForAuthors()
    {
        ini_set('max_execution_time', 1200000);
        $authors = Author::where('id','>',308)->get();

        foreach ($authors as $author) {
            $imageUrl = $author->image_url;

            // دانلود تصویر
            $response = Http::get($imageUrl);
            $imageData = $response->body();

            // ذخیره تصویر در پوشه‌ی storage/app/authors
            $imageName = "author_{$author->id}.jpg";
            $path = "authors/{$imageName}";
            Storage::put($path, $imageData);

            // آدرس تصویر جدید را به جایگزین image_url در دیتابیس کنید
            $author->update(['image_url' => $path]);
        }

    }
    public function byCategory($category)
    {

        $this->categoryId = Category::query()->where('slug', $category)->value('id');

        ini_set('max_execution_time', 1200000);

        https://betadrij.ir/subject/self-development/page/2/

        $baseURL = 'https://betadrij.ir/subject/' . $category . '/page/';
        $pageCount = 13;

        $urls = [];

        for ($page = 1; $page <= $pageCount; $page++) {
            $urls[] = $baseURL . $page;
        }


        foreach ($urls as $url) {
            $this->extractBooks($url);
        }

    }

    public function extractBooks($url)
    {
        $client = new Client();
        $response = $client->get($url);

        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $books = [];

        $productElements = $crawler->filter('div.product-small');

        $productElements->each(function (Crawler $product) use (&$books) {
            $title = $product->filter('p.name.product-title.woocommerce-loop-product__title')->text();
            $price = $product->filter('span.woocommerce-Price-amount.amount')->text();
            $link = $product->filter('a.woocommerce-LoopProduct-link.woocommerce-loop-product__link')->attr('href');
            $image = $product->filter('img')->attr('src');

            $books[] = [
                'title' => $title,
                'price' => $price,
                'link' => $link,
                'image' => $image,
            ];


        });

        foreach ($books as $book) {
            $this->extractBookInfo($book['link']);
        }


        return $books;


    }

    public function getBookSlug($url): string
    {
        $path = parse_url($url, PHP_URL_PATH);

        return pathinfo($path, PATHINFO_BASENAME);

    }


    public function extractBookInfo($url, $save = true)
    {

        // Send an HTTP request to the provided URL
        $client = new Client();
        $response = $client->request('GET', $url);
        $htmlContent = $response->getBody()->getContents();

        // Check if the request was successful (status code 200)
        if ($response->getStatusCode() == 200) {
            // Parse the HTML content using Symfony Panther
            $crawler = new Crawler($htmlContent);

            // Extract information from the HTML structure
            $bookName = $crawler->filter('h1')->text();
            $authorName = $crawler->filter('a[rel="tag"]')->eq(0)->text();
            $translatorName = $crawler->filter('a[rel="tag"]')->eq(1)->text();

            $publicationName = $crawler->filter('a[rel="tag"]')->eq(2)->count() > 0
                ? $crawler->filter('a[rel="tag"]')->eq(2)->text()
                : '';

            // Extract the book image URL if it exists
            $largeImageElement = $crawler->filter('picture[data-large_image]');


            $bookDescription = $crawler->filter('#tab-description')->count() > 0
                ? $crawler->filter('#tab-description')->text()
                : '';


            // Extract the value of the data-large_image attribute


            if ($largeImageElement->count() > 0) {
                $dataLargeImageValue = $largeImageElement->attr('data-large_image');
                $ImageUrl = $this->downloadImage($dataLargeImageValue, $this->getBookSlug($url));
            } else    $ImageUrl = '';


            // Helper function to get text content if the node exists
            $getTextIfExists = function ($crawler, $selector) {
                $node = $crawler->filter($selector);

                return $node->count() > 0 ? $node->text() : '';
            };

            // Extract information from the HTML table and store in variables
            $publishDateAd = $getTextIfExists($crawler, 'tr.pa_publish-date-en th + th');
            $publishDateShamsi = $getTextIfExists($crawler, 'tr.pa_publish-date-fa th + th');
            $isbn = $getTextIfExists($crawler, 'tr.pa_isbn th + th');
            $coverType = $getTextIfExists($crawler, 'tr.pa_cover th + th');
            $size = $getTextIfExists($crawler, 'tr.pa_size th + th');
            $pageCount = $getTextIfExists($crawler, 'tr.pa_pages th + th');
            $printNumber = $getTextIfExists($crawler, 'tr.pa_print-num th + th');

            // Extract information about the author's image
            $authorImageElement = $crawler->filter('div.img-inner img');
            $authorImageUrl = $authorImageElement->attr('src');

            // Store the extracted information in an array


            $bookData = [
                'slug' => $this->getBookSlug($url),
                'author_name' => $authorName,
                'author_image_url' => $authorImageUrl,
                'book_title' => $bookName,
                'book_description' => $bookDescription,
                'book_image_url' => $ImageUrl,
                'translator' => $translatorName,
                'publication' => $publicationName,
                'publish_date' => $publishDateAd,
                'isbn' => $isbn,
                'cover_type' => $coverType,
                'size' => $size,
                'page_count' => $pageCount,
                'print_number' => $printNumber,

            ];

            if ($save) {
                $this->saveBookDataToDatabase($bookData);
            }

            // Return the array with extracted information
            return $bookData;
        } else {
            echo "Error: Unable to retrieve the page. Status Code: {$response->getStatusCode()}\n";
            // Return an empty array in case of an error
            return [];
        }
    }

    public function saveBookDataToDatabase($bookData)
    {
        // 1. Author
        $author = Author::where('name', $bookData['author_name'])->first();
        if (!$author) {
            $author = Author::create([
                'name' => $bookData['author_name'],
                'image_url' => $bookData['author_image_url'],
//                'description' => $bookData['author_description'],
            ]);
        }

        // 2. Book
        $book = Book::where('title', $bookData['book_title'])->first();
        if (!$book) {
            $book = Book::create([
                'slug' => $bookData['slug'],
                'title' => $bookData['book_title'],
                'description' => $bookData['book_description'],
                'book_image_url' => $bookData['book_image_url'],
                'translator' => $bookData['translator'],
                'publication' => $bookData['publication'],
                'publish_date' => $bookData['publish_date'],
                'isbn' => $bookData['isbn'],
                'cover_type' => $bookData['cover_type'],
                'size' => $bookData['size'],
//                'page_count' => $bookData['page_count'],
                'print_number' => $bookData['print_number'],
                'author_id' => $author->id,
                'category_id' => $this->categoryId,
            ]);
        }


    }

    public function downloadImage($imageUrl, $newFilename)
    {
        // دریافت محتوای عکس از طریق URL
        $imageContent = file_get_contents($imageUrl);

        // دریافت پسوند فایل اصلی
        $originalExtension = pathinfo($imageUrl, PATHINFO_EXTENSION);

        // اضافه کردن پسوند به نام جدید فایل
        $newFilenameWithExtension = "{$newFilename}.{$originalExtension}";

        // بررسی وجود فایل با نام جدید در پوشه images
        if (!Storage::exists("public/images/{$newFilenameWithExtension}")) {
            // ذخیره فایل با نام جدید و پسوند در دیسک public در زیرپوشه images
            Storage::put("public/images/{$newFilenameWithExtension}", $imageContent);
        }

        // دریافت آدرس ذخیره شده
        $storedImagePath = Storage::url("images/{$newFilenameWithExtension}");

        return $storedImagePath;
    }
}
