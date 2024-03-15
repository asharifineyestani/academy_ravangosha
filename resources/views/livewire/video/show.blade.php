<section class="py-0 bg-dark position-relative">
    <div class="row g-0">
        <div class="d-flex">
            <div class="overflow-hidden fullscreen-video w-100">
                <!-- Full screen video START -->


                <div class="video-player rounded-3">


                    <video controls crossorigin="anonymous" playsinline poster="{{$video->thumbnail_url}}">

                        @foreach($video->adapted_videos as $adapted)
                            <source src={{$adapted['url']}} type="video/mp4" size="{{$adapted['size']}}">
                        @endforeach
                        <source src="{{$video->video_url}}" type="video/mp4" size="1080">
                        <!-- Caption files -->
                        {{--                        <track kind="captions" label="English" srclang="en" src="https://elmokar.arvanvod.com/zNVrQJ8mYq/JjMQR3Nwkm/tooltip.vtt" default>--}}

                    </video>
                </div>
                <!-- Full screen video END -->

                <!-- Plyr resources and browser polyfills are specified in the pen settings -->
            </div>

         <div>
             <livewire:video.sidebar :video="$video" />
         </div>
        </div>
    </div>
</section>

<script>


    document.addEventListener('livewire:load', function () {
        player = document.getElementById("player");
        window.onblur = function () {
            @this.
            setWatchedTime(player.currentTime)
        };

    })


</script>

