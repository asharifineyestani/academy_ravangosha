@if($course->enrolled)
    @include('livewire.course.partials.enrolled')
@else
    @include('livewire.course.partials.without_enrolled')
@endif




