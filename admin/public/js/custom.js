/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:59:49
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-27 15:20:08
 */
//visitor page table
$(document).ready(function() {
    $("#VisitorDt").DataTable();
    $(".dataTables_length").addClass("bs-select");
});

//for services table
function getServiceData() {
    axios.get('/getServiceData')
        .then(function(response) {
            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
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
    axios.post('/serviceDelete', {
            id: deleteId
        })
        .then(function(response) {
            if (response.data == 1) {
                $('#deleteModal').modal('hide');
                toastr.success('Delete Success.');
                getServiceData();

            } else {
                $('#deleteModal').modal('hide');
                toastr.error('Delete Fail.');
                getServiceData();
            }
        })
        .catch(function(error) {

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
        axios.post('/serviceUpdate', {
                id: serviceId,
                name: serviceName,
                des: serviceDes,
                img: serviceImg,
            })
            .then(function(response) {
                if (response.data == 1) {
                    $('#editModal').modal('hide');
                    toastr.success('Update Success.');
                    getServiceData();

                } else {
                    $('#editModal').modal('hide');
                    toastr.error('Update Fail.');
                    getServiceData();
                }
            })
            .catch(function(error) {

            });

    }
}
