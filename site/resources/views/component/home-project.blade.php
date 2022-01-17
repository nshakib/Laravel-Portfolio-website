<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-07 20:48:36
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-07 21:30:22
 */
?>
<div class="container section-marginTop text-center">
    <h1 class="section-title">প্রজেক্ট</h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">
        <div id="one" class="owl-carousel mb-4 owl-theme">
            @foreach ($projectData as $project )
            <div class="item m-1 card">
                <div class="text-center">
                    <img class="w-100" src="{{ $project->project_img }}" alt="Card image cap">
                    <h5 class="service-card-title mt-4">{{ $project->project_name }}</h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{ $project->project_des }}</h6>
                    <button href="{{ $project->project_link }}" target="_blank"
                        class="normal-btn-outline mt-2 mb-4 btn">বিস্তারিত</button>
                </div>
            </div>
            @endforeach

        </div>
        <div class="d-inline ml-2">
            <i id="customPrevBtn" class="btn normal-btn">
                <</i> <i id="customNextBtn" class="btn normal-btn">>
            </i>
            <button class="normal-btn btn">সব গুলো</button>
        </div>
    </div>
