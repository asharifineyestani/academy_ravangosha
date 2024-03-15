<div>
    @for ($i = 1; $i <= 5; $i++)
        @if($star < $i)
            @if (round($star) == $i)


                <li class="list-inline-item me-0 small"><i
                        class="fas fa-star-half-alt text-warning"></i></li>
                @continue
            @endif
            <li class="list-inline-item me-0 small"><i
                    class="far fa-star text-warning"></i></li>
            @continue
        @endif
        <li class="list-inline-item me-0 small"><i
                class="fas fa-star text-warning"></i></li>
    @endfor
</div>
