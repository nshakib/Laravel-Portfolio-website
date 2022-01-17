/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:59:49
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-11 07:33:05
 */


//get project
function getProjectData() {
    axios.get('/getProjectData')
        .then(function(response) {
            if (response.status == 200) {
                $('#mainDivProject').removeClass('d-none');
                $('#loaderDivProject').addClass('d-none');

                $('#ProjectDataTable').DataTable().destroy();
                $('#Project_table').empty();

                var jsonData = response.data;
                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src=" + jsonData[i].project_img + "> </td>" +
                        "<td>" + jsonData[i].project_name + "</td>" +
                        "<td>" + jsonData[i].project_des + "</td>" +
                        "<td><a class='projectEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='projectDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#Project_table');
                });


                //project table delete icon
                $('.projectDeleteBtn').click(function() {
                    var id = $(this).data('id');

                    $('#projectDeleteId').html(id);
                    $('#deleteProjectModal').modal('show');
                })

                //project table edit icon click
                $('.projectEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#projectEditId').html(id);
                    projectUpdateDetails(id);
                    $('#editProjectModal').modal('show');
                })


                $('#ProjectDataTable').DataTable({ "order": false });
                $('.dataTables_length').addClass('bs-select');
            } else {
                $('#loaderDivProject').addClass('d-none');
                $('#WrongDivProject').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#loaderDivProject').addClass('d-none');
            $('#WrongDivProject').removeClass('d-none');
        });
}

/*......................................................*/
//add on click button
//add new modal open
$("#addNewProjectBtnId").click(function() {
    $("#addProjectModal").modal('show');
});

//project save button
$('#addProjectConfirmBtn').click(function() {
        var projectName = $('#projectNameId').val();
        var projectDes = $('#projectDesId').val();
        var projectLink = $('#projectLinkId').val();
        var projectImg = $('#projectImageId').val();

        projectAdd(projectName, projectDes, projectLink, projectImg);
    })
    //project add method

function projectAdd(projectName, projectDes, projectLink, projectImg) {

    if (projectName.length == 0) {

        toastr.error("project Name is Empty");

    } else if (projectDes.length == 0) {

        toastr.error("project Des is Empty");

    } else if (projectLink.length == 0) {

        toastr.error("project Link is Empty");

    } else if (projectImg.length == 0) {

        toastr.error("project image is Empty");

    } else {
        $('#addProjectConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
        axios.post('/projectAdd', {
                project_name: projectName, //first controller , second method parameter name
                project_des: projectDes,
                project_link: projectLink,
                project_img: projectImg,
            })
            .then(function(response) {
                $('#addProjectConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#addProjectModal').modal('hide');
                        toastr.success('Add Success.');
                        getProjectData();

                    } else {
                        $('#addProjectModal').modal('hide');
                        toastr.error('Add Fail.');
                        getProjectData();
                    }
                } else {
                    $('#addProjectModal').modal('hide');
                    toastr.error('Something went wrong !');
                }

            })
            .catch(function(error) {
                $('#addProjectModal').modal('hide');
                toastr.error('Something went wrong !');
            });
    }
}
/*......................................................*/
//Each projects Update edit details
function projectUpdateDetails(detailsId) {
    axios.post('/projectDetails', {
            id: detailsId,
        })
        .then(function(response) {
            if (response.status == 200) {
                $("#projectEditForm").removeClass('d-none');
                $("#projectEditLoader").addClass('d-none');

                var dataJSON = response.data;
                $("#projectUpdateNameId").val(dataJSON[0].project_name);
                $("#projectUpdateDesId").val(dataJSON[0].project_des);
                $("#projectUpdateLinkId").val(dataJSON[0].project_link);
                $("#projectUpdateImageId").val(dataJSON[0].project_img);
            } else {
                $("#projectEditLoader").addClass('d-none');
                $("#projectEditWrong").removeClass('d-none');
            }
        })
        .catch(function(error) {
            $("#projectEditLoader").addClass('d-none');
            $("#projectEditWrong").removeClass('d-none');
        });
}




//project update save button
$('#projectEditConfirmBtn').click(function() {
    var projectId = $('#projectEditId').html();
    var projectName = $('#projectUpdateNameId').val();
    var projectDes = $('#projectUpdateDesId').val();
    var projectLink = $('#projectUpdateLinkId').val();
    var projectImg = $('#projectUpdateImageId').val();

    projectUpdate(projectId, projectName, projectDes, projectLink, projectImg);
})


//project update
function projectUpdate(projectId, projectName, projectDes, projectLink, projectImg) {

    if (projectName.length == 0) {

        toastr.error("Project Name is Empty");

    } else if (projectDes.length == 0) {

        toastr.error("Project Des is Empty");

    } else if (projectLink.length == 0) {

        toastr.error("Project Link is Empty");

    } else if (projectImg.length == 0) {

        toastr.error("Project image is Empty");

    } else {
        $('#projectEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
        axios.post('/projectUpdate', {
                id: projectId,
                project_name: projectName,
                project_des: projectDes,
                project_link: projectLink,
                project_img: projectImg,
            })
            .then(function(response) {
                $('#projectEditConfirmBtn').html("Save");

                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#editProjectModal').modal('hide');
                        toastr.success('Update Success.');
                        getProjectData();

                    } else {
                        $('#editProjectModal').modal('hide');
                        toastr.error('Update Fail.');
                        getProjectData();
                    }
                } else {
                    $('#editProjectModal').modal('hide');
                    toastr.error('Something went wrong !');
                }

            })
            .catch(function(error) {
                $('#editProjectModal').modal('hide');
                toastr.error('Something went wrong !');
            });

    }
}


//project modal delete button
$('#projectDeleteConfirmBtn').click(function() {
        var id = $('#projectDeleteId').html();

        projectDelete(id);
    })
    //project delete
function projectDelete(deleteId) {
    $('#projectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
    axios.post('projectDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#projectDeleteConfirmBtn').html("Yes")
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteProjectModal').modal('hide');
                    toastr.success('Delete Success.');
                    getProjectData();

                } else {
                    $('#deleteProjectModal').modal('hide');
                    toastr.error('Delete Fail.');
                    getProjectData();
                }
            } else {
                $('#deleteProjectModal').modal('hide');
                toastr.error("Something went wrong !");
            }
        })
        .catch(function(error) {
            $('#deleteProjectModal').modal('hide');
            toastr.error("Something went wrong !");
        });
}