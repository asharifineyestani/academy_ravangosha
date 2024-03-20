<?php

namespace Database\Seeders;

use App\Models\YoutubeVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YoutubeVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        YoutubeVideo::create([
            'title' => 'معرفی کتاب اثر مرکب',
            'description' => 'در این ویدیو، با کتاب "اثر مرکب" آشنا می‌شوید که اثری ارزشمند از استیون کاوی است. من در این ویدیو به شما درباره مفهوم اثر مرکب، تأثیرات آن بر زندگی روزمره، و راهکارهایی که این کتاب ارائه می‌دهد برای بهبود کیفیت زندگی، صحبت می‌کنم. اگر می‌خواهید راهی برای بهبود شرایط و رسیدن به موفقیت در زندگی خود پیدا کنید، حتماً این ویدیو را تماشا کنید.',
            'image_url' => '/uploads/youtube_videos/cover1.jpg',
            'link' => 'https://www.youtube.com/watch?v=duQOxap0q_Y&list=PLnqTD8eCoAt-LkoHV7NL2-N-lWHVmk8i1&index=2',
        ]);

        YoutubeVideo::create([
            'title' => 'آشنایی با تله ایثار',
            'description' => 'در این ویدیو، به معرفی مفهوم "تله ایثار" می‌پردازم. تله ایثار یکی از الگوهای رفتاری است که در ارتباطات اجتماعی بسیار مهم است. من در این ویدیو توضیح می‌دهم که چرا باید از این تله در روابط اجتماعی استفاده کنیم و چگونه می‌توانیم با این تله، روابطی سالم و موثر برقرار کنیم. اگر می‌خواهید روابط خود را بهبود بخشید و مهارت‌های ارتباطی خود را تقویت کنید، این ویدیو را از دست ندهید.',
            'image_url' => '/uploads/youtube_videos/cover2.jpg',
            'link' => 'https://www.youtube.com/watch?v=uHTnWz5PUz0&list=PLnqTD8eCoAt-LkoHV7NL2-N-lWHVmk8i1&index=3',
        ]);

        YoutubeVideo::create([
            'title' => 'اصول چهل گانه تریز ',
            'description' => 'در این ویدیو، به شما اصول چهل گانه تریز را معرفی می‌کنم. این اصول یکی از اساسی‌ترین مباحث روانشناسی هستند که به بهبود روابط اجتماعی و فردی کمک می‌کنند. من در این ویدیو به شما اصول اصلی این چهل گانه را معرفی می‌کنم و نکات کلیدی آنها را توضیح می‌دهم. اگر می‌خواهید روابط خود را بهبود بخشید و به روانشناسی ارتباطی علاقه‌مند هستید، این ویدیو را از دست ندهید.',
            'image_url' => '/uploads/youtube_videos/cover3.jpg',
            'link' => 'https://www.youtube.com/watch?v=3F4Xcw6eXdI&list=PLnqTD8eCoAt-LkoHV7NL2-N-lWHVmk8i1&index=4',
        ]);

        YoutubeVideo::create([
            'title' => 'آشنایی با اختلالات شخصیتی',
            'description' => 'در این ویدیو، به معرفی و توضیح اختلالات شخصیتی مختلف می‌پردازم. من در این ویدیو به شما با انواع اختلالات شخصیتی، علایم آنها و راهکارهایی برای مدیریت آنها آشنا می‌کنم. اگر علاقه‌مند به فهم بهتر خود و دیگران هستید و می‌خواهید به مشکلات روانی با دید بیشتری نگاه کنید، این ویدیو را از دست ندهید.',
            'image_url' => '/uploads/youtube_videos/cover4.jpg',
            'link' => 'https://www.youtube.com/watch?v=43Wa0P6EnnI&list=PLnqTD8eCoAt-LkoHV7NL2-N-lWHVmk8i1&index=5',
        ]);

        YoutubeVideo::create([
            'title' => 'آشنایی با تله بدبینی',
            'description' => 'در این ویدیو، به معرفی تله بدبینی و تأثیرات آن بر زندگی می‌پردازم. تله بدبینی یکی از الگوهای رفتاری است که می‌تواند به شکل‌دهی به زندگی ما اثرات مهمی داشته باشد. من در این ویدیو به شما تأثیرات منفی تله بدبینی را معرفی می‌کنم و راهکارهایی برای مقابله با آن را ارائه می‌دهم. اگر می‌خواهید نگرش خود را بهبود بخشید و به سمت یک زندگی مثبت‌تر حرکت کنید، این ویدیو را تماشا کنید.',
            'image_url' => '/uploads/youtube_videos/cover5.jpg',
            'link' => 'https://www.youtube.com/watch?v=WeekgaK38Mg&list=PLnqTD8eCoAt-LkoHV7NL2-N-lWHVmk8i1&index=6',
        ]);

        YoutubeVideo::create([
            'title' => 'آشنایی با اختلال شخصیت پارانویید',
            'description' => 'در این ویدیو، به معرفی و توضیح اختلال شخصیت پارانویید می‌پردازم. این اختلال یکی از اختلالات روانی است که به طور خاص تأثیراتی بر روی تفکر و رفتار افراد دارد. در این ویدیو، شما با علائم، عوامل موجب و راهکارهای مدیریت اختلال شخصیت پارانویید',
            'image_url' => '/uploads/youtube_videos/cover1.jpg',
            'link' => 'https://www.youtube.com/watch?v=NA0U1bxHb9o&list=PLnqTD8eCoAt-LkoHV7NL2-N-lWHVmk8i1&index=7',
        ]);


    }
}
