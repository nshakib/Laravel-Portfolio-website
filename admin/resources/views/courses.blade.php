<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-01 22:57:26
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-07 15:00:59
 */
?>
@extends('layouts.app')

@section('content')
<div id="mainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button id="addNewCourseBtnId" class="btn my-3 btn-danger">Add New</button>

            <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Fee</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Enroll</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="courseTable">

                    {{-- <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">2000</th>
                        <th class="th-sm">200</th>
                        <th class="th-sm">200</th>
                        <th class="th-sm"><a href=""><i class="fas fa-edit"></i></a></th>
                        <th class="th-sm"><a href=""><i class="fas fa-trash-alt"></i></a></th>
                    </tr> --}}


                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- loader --}}
<div class="container" id="loaderDivCourse">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
        </div>
    </div>
</div>

{{-- something went div --}}
<div class="container d-none" id="wrongDivCourse">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something went wrong !</h3>
        </div>
    </div>
</div>

{{-- Add course modal --}}

<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <input id="CourseNameId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Name">

                            <input id="CourseDesId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Description">

                            <input id="CourseFeeId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Fee">

                            <input id="CourseEnrollId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Enroll">
                        </div>

                        <div class="col-md-6">
                            <input id="CourseClassId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Class">

                            <input id="CourseLinkId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Link">

                            <input id="CourseImgId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h5 class="mt-4">Do you want to delete</h5>
                <h5 id="courseDeleteId" class="mt-4 d-none"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button id="courseDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>


{{-- edit course modal --}}

<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h5 id="updateCourseId" class="mt-4 d-none">...</h5>
                <div id="courseEditForm" class="container d-none">
                    <div class="row">

                        <div class="col-md-6">
                            <input id="CourseNameUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Name">

                            <input id="CourseDesUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Description">

                            <input id="CourseFeeUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Fee">

                            <input id="CourseEnrollUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Enroll">
                        </div>

                        <div class="col-md-6">
                            <input id="CourseClassUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Total Class">

                            <input id="CourseLinkUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Link">

                            <input id="CourseImgUpdateId" type="text" id="" class="form-control mb-3"
                                placeholder="Course Image">
                        </div>

                        <img id="courseEditLoder" class="loading-icon m-5" src="{{ asset('images/loader.svg') }}">
                        <h5 id="courseEditWrong" class="d-none">Something went wrong !</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="CourseEditConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    getCourseData();

//get data from course table
function getCourseData() {
    axios.get('/courses/getData')
        .then(function(response) {
            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');

                $('#courseDataTable').DataTable().destroy(); //data table clear
                $('#courseTable').empty(); //refresh for empty table, reduce for duplicate show

                var dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(

                        "<td>" + dataJSON[i].course_name + "</td>" +

                        "<td>" + dataJSON[i].course_fee + "</td>" +
                        "<td>" + dataJSON[i].course_totalclass + "</td>" +
                        "<td>" + dataJSON[i].course_totalenroll + "</td>" +


                        "<td> <a class='courseEditBtn' data-id=" + dataJSON[i].id + "> <i class ='fas fa-edit'> </i></a> </td>" +
                        "<td> <a class='courseDeleteBtn' data-id=" + dataJSON[i].id + "> <i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#courseTable');
                });


                //delete course modal
                $('.courseDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $("#courseDeleteId").html(id);

                    $("#deleteCourseModal").modal('show');
                })

                //Course edit icon click
                $('.courseEditBtn').click(function() {
                    var id = $(this).data('id');
                    CourseUpdateDetails(id);
                    $('#updateCourseId').html(id)
                    $('#editCourseModal').modal('show');
                })

                $('#courseDataTable').DataTable({ "order": false }); // for pagination
                $(".dataTables_length").addClass("bs-select"); // show data according to size


            } else {
                $('#loaderDivCourse').addClass('d-none');
                $('#wrongDivCourse').removeClass('d-none');
            }

        }).catch(function(error) {
            $('#loaderDivCourse').addClass('d-none');
            $('#wrongDivCourse').removeClass('d-none');
        });
}

//button click
$("#addNewCourseBtnId").click(function() {
    $("#addCourseModal").modal('show');
});

//course add confirmation
$("#CourseAddConfirmBtn").click(function() {
    var CourseName = $("#CourseNameId").val();
    var CourseDes = $("#CourseDesId").val();
    var CourseFee = $("#CourseFeeId").val();
    var CourseEnroll = $("#CourseEnrollId").val();
    var CourseClass = $("#CourseClassId").val();
    var CourseLink = $("#CourseLinkId").val();
    var CourseImg = $("#CourseImgId").val();

    CourseAdd(CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg);
})


//course add method
function CourseAdd(CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg) {

    if (CourseName.length == 0) {

        toastr.error("Course Name is Empty !");

    } else if (CourseDes.length == 0) {

        toastr.error("Course Des is Empty !");

    } else if (CourseFee.length == 0) {

        toastr.error("Course Fee is Empty !");

    } else if (CourseEnroll.length == 0) {

        toastr.error("Course Enroll is Empty !");

    } else if (CourseClass.length == 0) {

        toastr.error("Course class is Empty !");

    } else if (CourseLink.length == 0) {

        toastr.error("Course Link is Empty !");

    } else if (CourseImg.length == 0) {

        toastr.error("Course image is Empty !");

    } else {
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
        axios.post('/coursesAddData', {
                course_name: CourseName, //first controller , second method parameter name
                course_des: CourseDes,
                course_fee: CourseFee,
                course_totalenroll: CourseEnroll,
                course_totalclass: CourseClass,
                course_link: CourseLink,
                course_img: CourseImg,
            })
            .then(function(response) {
                $('#CourseAddConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#addCourseModal').modal('hide');
                        toastr.success('Add Success.');
                        getCourseData();

                    } else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('Add Fail.');
                        getCourseData();
                    }
                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.error('Something went wrong !');
                }

            })
            .catch(function(error) {
                $('#addCourseModal').modal('hide');
                toastr.error('Something went wrong !');
            });

    }
}


//course delete confirmation
$("#courseDeleteConfirmBtn").click(function() {
    var id = $("#courseDeleteId").html();
    CourseDelete(id);
})

//course delete method
function CourseDelete(deleteId) {
    $('#courseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
    axios.post('/coursesDelete', {
            id: deleteId,
        })
        .then(function(response) {
            $('#courseDeleteConfirmBtn').html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    toastr.success('Delete Success.');
                    getCourseData();

                } else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Fail.');
                    getCourseData();
                }
            } else {
                $('#deleteCourseModal').modal('hide');
                toastr.error("Something went wrong !");
            }
        })
        .catch(function(error) {
            $('#deleteCourseModal').modal('hide');
            toastr.error("Something went wrong !");
        });
}


//Course edit details
function CourseUpdateDetails(detailsId) {
    axios.post('/courses/details', {
            id: detailsId
        })
        .then(function(response) {
            if (response.status == 200) {

                $("#courseEditForm").removeClass('d-none');
                $("#courseEditLoder").addClass('d-none');

                var dataJSON = response.data;
                $("#CourseNameUpdateId").val(dataJSON[0].course_name);
                $("#CourseDesUpdateId").val(dataJSON[0].course_des);
                $("#CourseFeeUpdateId").val(dataJSON[0].course_fee);
                $("#CourseEnrollUpdateId").val(dataJSON[0].course_totalenroll);
                $("#CourseClassUpdateId").val(dataJSON[0].course_totalclass);
                $("#CourseLinkUpdateId").val(dataJSON[0].course_link);
                $("#CourseImgUpdateId").val(dataJSON[0].course_img);
            } else {
                $("#courseEditLoder").addClass('d-none');
                $("#courseEditWrong").removeClass('d-none');
            }
        })
        .catch(function(error) {
            $("#courseEditLoder").addClass('d-none');
            $("#courseEditWrong").removeClass('d-none');
        });
}


//Course update confirm
$("#CourseEditConfirmBtn").click(function() {
    var courseId = $('#updateCourseId').html();
    var CourseName = $("#CourseNameUpdateId").val();
    var CourseDes = $("#CourseDesUpdateId").val();
    var CourseFee = $("#CourseFeeUpdateId").val();
    var CourseEnroll = $("#CourseEnrollUpdateId").val();
    var CourseClass = $("#CourseClassUpdateId").val();
    var CourseLink = $("#CourseLinkUpdateId").val();
    var CourseImg = $("#CourseImgUpdateId").val();

    CourseUpdate(courseId, CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg);
})

//Course  update method
function CourseUpdate(courseId, CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg) {

    if (CourseName.length == 0) {

        toastr.error("Course Name is Empty !");

    } else if (CourseDes.length == 0) {

        toastr.error("Course Des is Empty !");

    } else if (CourseFee.length == 0) {

        toastr.error("Course Fee is Empty !");

    } else if (CourseEnroll.length == 0) {

        toastr.error("Course Enroll is Empty !");

    } else if (CourseClass.length == 0) {

        toastr.error("Course class is Empty !");

    } else if (CourseLink.length == 0) {

        toastr.error("Course Link is Empty !");

    } else if (CourseImg.length == 0) {

        toastr.error("Course image is Empty !");

    } else {
        $('#CourseEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
        axios.post('/courses/update', {
                id: courseId,
                course_name: CourseName,
                course_des: CourseDes,
                course_fee: CourseFee,
                course_totalenroll: CourseEnroll,
                course_totalclass: CourseClass,
                course_link: CourseLink,
                course_img: CourseImg,
            })
            .then(function(response) {
                $('#CourseEditConfirmBtn').html("Save")
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#editCourseModal').modal('hide');
                        toastr.success('Update Success.');
                        getCourseData();

                    } else {
                        $('#editCourseModal').modal('hide');
                        toastr.error('Update Fail.');
                        getCourseData();
                    }
                } else {
                    toastr.error('Something went wrong !');
                }

            })
            .catch(function(error) {
                $('#editCourseModal').modal('hide');
                toastr.error('Something went wrong !');
            });

    }
}
</script>
@endsection
