<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-29 22:25:49
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-29 23:30:03
 */
?>
<div class="container section-marginTop text-center">
    <h1 class="section-title">কোর্স সমূহ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">
        @foreach ($coursesData as $course )
        <div class="col-md-4 thumbnail-container">
            <img src="{{ $course->course_img }}" alt="Avatar" class="thumbnail-image ">
            <div class="thumbnail-middle">
                <h1 class="thumbnail-title">{{ $course->course_name }}</h1>
                <h1 class="thumbnail-subtitle">{{ $course->course_des }}</h1>
                    <h1 class="thumbnail-subtitle">{{ $course->course_fee }}</h1>
                    {{-- <h1 class="thumbnail-subtitle">{{ $course->course_totalenroll }}</h1> --}}
                    <h1 class="thumbnail-subtitle">{{ $course->course_totalclass }}</h1>
                    <h1 class="thumbnail-subtitle">{{ $course->course_link }}</h1>
                    {{-- <h1 class="thumbnail-subtitle">{{ $course->course_img }}</h1> --}}
                <button class="normal-btn btn">শুরু করুন</button>
            </div>
        </div>
        @endforeach
    </div>
</div>