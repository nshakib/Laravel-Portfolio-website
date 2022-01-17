<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-07 21:31:28
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-13 00:21:10
 */
?>
@extends('layouts.app')
{{-- @section('title','Projects') --}}
@section('content')

<div id="mainDivProject" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewProjectBtnId" class="btn my-3 btn-danger">Add New</button>
            <table id="ProjectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="Project_table">

                </tbody>
            </table>

        </div>
    </div>
</div>


{{-- loader --}}
<div class="container" id="loaderDivProject">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
        </div>
    </div>
</div>

{{-- something went div --}}
<div class="container d-none" id="WrongDivProject">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went wrong !</h3>
        </div>
    </div>
</div>

<!--Add New Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div id=""" class="w-100">
                    <h6 class="mb-4">Add New project</h6>
                    <input type="text" id="projectNameId" id="" class="form-control mb-4" placeholder="project Name" />
                    <input type="text" id="projectDesId" id="" class="form-control mb-4" placeholder="project Describtion" />
                    <input type="text" id="projectLinkId" id="" class="form-control mb-4" placeholder="project Link" />
                    <input type="text" id="projectImageId" id="" class="form-control mb-4" placeholder="project Image Link" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="addProjectConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-4">
                <h5 id="projectEditId" class="mt-4 d-none">...</h5>
                <div id="projectEditForm" class="w-100 d-none">
                    <input type="text" id="projectUpdateNameId" id="" class="form-control mb-4" placeholder="project Name" />
                    <input type="text" id="projectUpdateDesId" id="" class="form-control mb-4" placeholder="project Describtion" />
                    <input type="text" id="projectUpdateLinkId" id="" class="form-control mb-4" placeholder="project Link" />
                    <input type="text" id="projectUpdateImageId" id="" class="form-control mb-4" placeholder="project Image Link" />
                </div>



                <img id="projectEditLoader" class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
                <h5 id="projectEditWrong" class="d-none">Something went wrong !</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="projectEditConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>


<!--Delete Modal -->
<div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h5 class="mt-4">Do you want to delete</h5>
                <h5 id="projectDeleteId" class="mt-4 d-none">...</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="projectDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
getProjectData();


</script>
@endsection
