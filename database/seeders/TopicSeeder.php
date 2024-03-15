<?php

namespace Database\Seeders;


use App\Models\Topic;
use App\Models\Video;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function setVideo($topic, $videos)
    {

        foreach ($videos as $video) {
            Video::create([
                'title' => $video['title'],
                'path' => $video['path'],
                'is_free' => $video['is_free'] ?? false,
                'topic_id' => $topic->id,
            ]);
        }


    }

    public function run()
    {
        $t1 = Topic::create([
            'title' => 'فصل اول - مقدمه',
            'course_id' => 8,
        ]);

        $this->setVideo($t1, [
            [
                'path' => '/courses/yaser/docker/1.0.mp4',
                'title' => 'معرفی داکر',
                'is_free' => true
            ],
            [
                'path' => '/courses/yaser/docker/1.1.mp4',
                'title' => 'عنوان مشخص نشده',
            ],
            [
                'path' => '/courses/yaser/docker/1.2.mp4',
                'title' => 'Vm vs docker'
            ],

            [
                'path' => '/courses/yaser/docker/1.3.mp4',
                'title' => 'Docker usage in production'
            ],
        ]);


        $t2 = Topic::create([
            'title' => 'فصل دوم - نصب',
            'course_id' => 8,
        ]);

        $this->setVideo($t2, [
            [
                'path' => '/courses/yaser/docker/2.0.mp4',
                'title' => 'Get starting',
                'is_free' => true
            ],
            [
                'path' => '/courses/yaser/docker/2.1.mp4',
                'title' => 'find'
            ],
            [
                'path' => '/courses/yaser/docker/2.2.mp4',
                'title' => 'hub'
            ],

        ]);


        $t3 = Topic::create([
            'title' => 'فصل سوم - مفاهیم پایه',
            'course_id' => 8,
        ]);

        $this->setVideo($t3, [
            [
                'path' => '/courses/yaser/docker/3.1.mp4',
                'title' => 'Docker pull'
            ],
            [
                'path' => '/courses/yaser/docker/3.2.mp4',
                'title' => 'Docker save & load'
            ],
            [
                'path' => '/courses/yaser/docker/3.3.mp4',
                'title' => 'Docker inspect'
            ],

            [
                'path' => '/courses/yaser/docker/3.4.1.mp4',
                'title' => 'Docker rmi '
            ],

            [
                'path' => '/courses/yaser/docker/3.4.2.mp4',
                'title' => 'Docker rmi dangling '
            ],

            [
                'path' => '/courses/yaser/docker/3.5.1.mp4',
                'title' => 'registry'
            ],

            [
                'path' => '/courses/yaser/docker/3.5.2.mp4',
                'title' => 'Create local registry'
            ],

        ]);


        $t4 = Topic::create([
            'title' => 'فصل چهارم',
            'course_id' => 8,
        ]);

        $this->setVideo($t4, [
            [
                'path' => '/courses/yaser/docker/4.1.0.mp4',
                'title' => 'What is container'
            ],

            [
                'path' => '/courses/yaser/docker/4.1.1.mp4',
                'title' => 'What is container 2'
            ],


            [
                'path' => '/courses/yaser/docker/4.2.1.mp4',
                'title' => 'ps'
            ],
            [
                'path' => '/courses/yaser/docker/4.2.2.mp4',
                'title' => 'ps'
            ],

            [
                'path' => '/courses/yaser/docker/4.3.mp4',
                'title' => 'run'
            ],

            [
                'path' => '/courses/yaser/docker/4.4.mp4',
                'title' => 'port'
            ],

            [
                'path' => '/courses/yaser/docker/4.5.mp4',
                'title' => 'committee'
            ],

            [
                'path' => '/courses/yaser/docker/4.6.mp4',
                'title' => 'State transition '
            ],

            [
                'path' => '/courses/yaser/docker/4.7.mp4',
                'title' => 'Java run example'
            ],

            [
                'path' => '/courses/yaser/docker/4.8.0.mp4',
                'title' => 'Docker file'
            ],

            [
                'path' => '/courses/yaser/docker/4.8.1.mp4',
                'title' => 'Docker file description'
            ],

        ]);


        $t5 = Topic::create([
            'title' => 'فصل پنجم',
            'course_id' => 8,
        ]);

        $this->setVideo($t5, [
            [
                'path' => '/courses/yaser/docker/5.1.1.mp4',
                'title' => 'Docker volume'
            ],
            [
                'path' => '/courses/yaser/docker/5.1.2.mp4',
                'title' => 'Docker volume doc'
            ],
            [
                'path' => '/courses/yaser/docker/5.2.mp4',
                'title' => 'Docker cp'
            ],

        ]);


        $t6 = Topic::create([
            'title' => 'فصل ششم',
            'course_id' => 8,
        ]);

        $this->setVideo($t6, [
            [
                'path' => '/courses/yaser/docker/6.1.mp4',
                'title' => 'Docker compose'
            ],
            [
                'path' => '/courses/yaser/docker/6.2.mp4',
                'title' => 'Yaml file'
            ],
            [
                'path' => '/courses/yaser/docker/6.3.mp4',
                'title' => 'Docker compose'
            ],

            [
                'path' => '/courses/yaser/docker/6.4.mp4',
                'title' => 'Example'
            ],

        ]);


        $t7 = Topic::create([
            'title' => 'فصل هفتم',
            'course_id' => 8,
        ]);

        $this->setVideo($t7, [
            [
                'path' => '/courses/yaser/docker/7.1.mp4',
                'title' => 'Docker compose'
            ],
            [
                'path' => '/courses/yaser/docker/7.2.mp4',
                'title' => 'Yaml file'
            ],

        ]);


    }
}
