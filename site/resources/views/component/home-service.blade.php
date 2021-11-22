<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-17 23:17:20
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-17 23:48:06
 */
?>
<div class="container section-marginTop text-center">
    <h1 class="secti    on-title">সার্ভিস সমূহ </h1>
    <h1 class="secti on-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">
        @foreach ($servicesData as $service )
        <div cla ss="col-lg-3 p-2 ">
            <div class="card service-card text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src="{{$service->service_img  }}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">{{$service->service_name }}</h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{ $service->service_des }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
