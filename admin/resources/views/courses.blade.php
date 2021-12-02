<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-01 22:57:26
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-02 22:28:26
 */
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Fee</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Enroll</th>
                        <th class="th-sm">Dtails</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">2000</th>
                        <th class="th-sm">200</th>
                        <th class="th-sm">200</th>
                        <th class="th-sm"><a href=""><i class="fas fa-eye"></i></a></th>
                        <th class="th-sm"><a href=""><i class="fas fa-edit"></i></a></th>
                        <th class="th-sm"><a href=""><i class="fas fa-trash-alt"></i></a></th>
                    </tr>


                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- loader --}}
<div class="container" id="loaderDiv">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
        </div>
    </div>
</div>

{{-- something went div --}}
<div class="container d-none" id="wrongDiv">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went wrong !</h3>
        </div>
    </div>
</div>


</div>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
