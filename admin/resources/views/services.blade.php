<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-18 05:58:50
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-27 13:03:37
 */
?>
@extends('layouts.app')
@section('content')
<div class="container d-none" id="mainDiv">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="service_table">
                    {{-- <tr>
                        <th class="th-sm"><img class="table-img" src="images/Knowledge.svg"></th>
                        <th class="th-sm">আইটি কোর্স</th>
                        <th class="th-sm">মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট</th>
                        <th class="th-sm"><a href=""><i class="fas fa-edit"></i></a></th>
                        <th class="th-sm"><a href=""><i class="fas fa-trash-alt"></i></a></th>
                    </tr> --}}
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="container" id="loaderDiv">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
        </div>
    </div>
</div>

<div class="container d-none" id="wrongDiv">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went wrong !</h3>
        </div>
    </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h5 class="mt-4">Do you want to delete</h5>
                <h5 id="serviceDeleteId" class="mt-4">...</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="serviceDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-5">

                <h5 id="serviceEditId" class="mt-4">...</h5>
                <div id="serviceEditForm" class="w-100 d-none">
                    <input type="text" id="serviceNameId" id="" class="form-control mb-4" placeholder="Service Name" />
                    <input type="text" id="serviceDesId" id="" class="form-control mb-4" placeholder="Service Describtion" />
                    <input type="text" id="serviceImageId" id="" class="form-control mb-4" placeholder="Service Image Link" />
                </div>



                <img id="serviceEditLoder" class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
                <h5 id="serviceEditWrong" class="d-none">Something went wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="serviceEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    getServiceData();

</script>
@endsection
