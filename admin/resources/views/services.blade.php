<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-18 05:58:50
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-05 23:36:45
 */
?>
@extends('layouts.app')
@section('content')
<div class="container d-none" id="mainDiv">
    <div class="row">
        <div class="col-md-12 p-5">

            <button id="addNewBtnId" class="btn my-3 btn-danger">Add New</button>

            <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h5 class="mt-4">Do you want to delete</h5>
                <h5 id="serviceDeleteId" class="mt-4 d-none">...</h5>
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
            <div class="modal-header">
                <h5 class="modal-title">Update Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-4">
                <h5 id="serviceEditId" class="mt-4 d-none">...</h5>
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


<!--Add New Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div id="serviceAddForm" class="w-100">
                    <h6 class="mb-4">Add New Service</h6>
                    <input type="text" id="serviceNameAddId" id="" class="form-control mb-4" placeholder="Service Name" />
                    <input type="text" id="serviceDesAddId" id="" class="form-control mb-4" placeholder="Service Describtion" />
                    <input type="text" id="serviceImageAddId" id="" class="form-control mb-4" placeholder="Service Image Link" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="addServiceConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    getServiceData();

//for services table
function getServiceData() {
    axios.get('/getServiceData')
        .then(function(response) {
            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#serviceDataTable').DataTable().destroy();
                $('#service_table').empty(); //refresh for empty table, reduce for duplicate show

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src=" + dataJSON[i].service_img + "> </td>" +
                        "<td>" + dataJSON[i].service_name +
                        "<td>" + dataJSON[i].service_des + "</td>" +
                        "<td> <a class='serviceEditBtn' data-id=" + dataJSON[i].id + "> <i class ='fas fa-edit'> </i></a> </td>" +
                        "<td> <a class='serviceDeleteBtn' data-id=" + dataJSON[i].id + "> <i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#service_table');
                });


                //service table delete icon
                $('.serviceDeleteBtn').click(function() {
                    var id = $(this).data('id');

                    $('#serviceDeleteId').html(id);
                    $('#deleteModal').modal('show');
                })

                //service table edit icon click
                $('.serviceEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#serviceEditId').html(id);
                    ServiceUpdateDetails(id);
                    $('#editModal').modal('show');
                })

                $('#serviceDataTable').DataTable({"order":false}); // for pagination
                $(".dataTables_length").addClass("bs-select");// show data according to size


            } else {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }

        }).catch(function(error) {
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });
}


//service modal delete button
$('#serviceDeleteConfirmBtn').click(function() {
        var id = $('#serviceDeleteId').html();

        ServiceDelete(id);
    })
    //service delete
function ServiceDelete(deleteId) {
    $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
    axios.post('serviceDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#serviceDeleteConfirmBtn').html("Yes")
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteModal').modal('hide');
                    toastr.success('Delete Success.');
                    getServiceData();

                } else {
                    $('#deleteModal').modal('hide');
                    toastr.error('Delete Fail.');
                    getServiceData();
                }
            } else {
                $('#deleteModal').modal('hide');
                toastr.error("Something went wrong !");
            }
        })
        .catch(function(error) {
            $('#deleteModal').modal('hide');
            toastr.error("Something went wrong !");
        });
}

//Each services Update edit details
function ServiceUpdateDetails(detailsId) {
    axios.post('/serviceDetails', {
            id: detailsId
        })
        .then(function(response) {
            if (response.status == 200) {
                $("#serviceEditForm").removeClass('d-none');
                $("#serviceEditLoder").addClass('d-none');
                var dataJSON = response.data;
                $("#serviceNameId").val(dataJSON[0].service_name);
                $("#serviceDesId").val(dataJSON[0].service_des);
                $("#serviceImageId").val(dataJSON[0].service_img);
            } else {
                $("#serviceEditLoder").addClass('d-none');
                $("#serviceEditWrong").removeClass('d-none');
            }
        })
        .catch(function(error) {
            $("#serviceEditLoder").addClass('d-none');
            $("#serviceEditWrong").removeClass('d-none');
        });
}


//service update save button
$('#serviceEditConfirmBtn').click(function() {
        var id = $('#serviceEditId').html();
        var name = $('#serviceNameId').val();
        var des = $('#serviceDesId').val();
        var img = $('#serviceImageId').val();

        ServiceUpdate(id, name, des, img);
    })


//Service update
function ServiceUpdate(serviceId, serviceName, serviceDes, serviceImg) {

    if (serviceName.length == 0) {

        toastr.error("Service Name is Empty");

    } else if (serviceDes.length == 0) {

        toastr.error("Service Des is Empty");

    } else if (serviceImg.length == 0) {

        toastr.error("Service image is Empty");

    } else {
        $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
        axios.post('/serviceUpdate', {
                id: serviceId,
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })
            .then(function(response) {
                $('#serviceEditConfirmBtn').html("Save")
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#editModal').modal('hide');
                        toastr.success('Update Success.');
                        getServiceData();

                    } else {
                        $('#editModal').modal('hide');
                        toastr.error('Update Fail.');
                        getServiceData();
                    }
                } else {
                    toastr.error('Something went wrong !');
                }

            })
            .catch(function(error) {
                $('#editModal').modal('hide');
                toastr.error('Something went wrong !');
            });

    }
}

//add on click button
$("#addNewBtnId").click(function() {
    $("#addModal").modal('show');


});

//service update save button
$('#addServiceConfirmBtn').click(function() {
    var name = $('#serviceNameAddId').val();
    var des = $('#serviceDesAddId').val();
    var img = $('#serviceImageAddId').val();

    ServiceAdd(name, des, img);
    getServiceData();
})

//service add method
function ServiceAdd(serviceName, serviceDes, serviceImg) {

    if (serviceName.length == 0) {

        toastr.error("Service Name is Empty");

    } else if (serviceDes.length == 0) {

        toastr.error("Service Des is Empty");

    } else if (serviceImg.length == 0) {

        toastr.error("Service image is Empty");

    } else {
        $('#addServiceConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
        axios.post('/serviceAdd', {
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })
            .then(function(response) {
                $('#addServiceConfirmBtn').html("Save")
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#addModal').modal('hide');
                        toastr.success('Add Success.');
                        getServiceData();

                    } else {
                        $('#addModal').modal('hide');
                        toastr.error('Add Fail.');
                        getServiceData();
                    }
                } else {
                    toastr.error('Something went wrong !');
                }

            })
            .catch(function(error) {
                $('#addModal').modal('hide');
                toastr.error('Something went wrong !');
            });

    }
}


</script>
@endsection
