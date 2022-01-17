<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2022-01-12 06:48:53
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-12 07:48:25
 */

?>
@extends('layouts.app')

@section('content')
<div id="mainDivTest" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <table id="TestDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="Test_table">

                </tbody>
            </table>

        </div>
    </div>
</div>


{{-- loader --}}
<div class="container" id="loaderDivTest">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
        </div>
    </div>
</div>

{{-- something went div --}}
<div class="container d-none" id="WrongDivTest">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went wrong !</h3>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
getTestData();

function getTestData()
{
    axios.get('/getTestData')
        .then(function(response) {
            if (response.status == 200) {
                $('#mainDivTest').removeClass('d-none');
                $('#loaderDivTest').addClass('d-none');

                $('#TestDataTable').DataTable().destroy();
                $('#Test_table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src=" + jsonData[i].project_img + "> </td>" +
                        "<td>" + jsonData[i].project_name + "</td>" +
                        "<td>" + jsonData[i].project_des + "</td>" +
                        "<td><a class='ProjectEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='ProjectDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#Test_table');
                });

                $('#TestDataTable').DataTable({ "order": false });
                $('.dataTables_length').addClass('bs-select');
            } else {
                $('#loaderDivTest').addClass('d-none');
                $('#WrongDivTest').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#loaderDivTest').addClass('d-none');
            $('#WrongDivTest').removeClass('d-none');
        });
}
</script>
@endsection
