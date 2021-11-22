/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:59:49
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-22 22:45:05
 */
$(document).ready(function() {
    $("#VisitorDt").DataTable();
    $(".dataTables_length").addClass("bs-select");
});


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
                        "<td> <a href=''> <i class = 'fas fa-edit'> </i></a> </td>" +
                        "<td> <a class='serviceDeleteBtn' data-id=" + dataJSON[i].id + "> <i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#service_table');
                });



                $('.serviceDeleteBtn').click(function() {
                    var id = $(this).data('id');

                    $('#serviceDeleteId').html(id);
                    $('#deleteModal').modal('show');
                })

                //cofirm button
                $('#serviceDeleteConfirmBtn').click(function() {
                    var id = $('#serviceDeleteId').html();

                    getServiceDelete(id);
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

//delete function
function getServiceDelete(deleteId) {
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
//data-toggle="modal" data-target="#basicExampleModal"
