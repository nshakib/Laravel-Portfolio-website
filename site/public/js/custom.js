/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 21:57:34
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-18 00:19:41
 */
// Owl Carousel Start..................

$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $("#customNextBtn").click(function() {
        one.trigger("next.owl.carousel");
    });
    $("#customPrevBtn").click(function() {
        one.trigger("prev.owl.carousel");
    });
    one.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4,
            },
        },
    });

    two.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
});

// Owl Carousel End..................

$('#contactSendBtnId').click(function() {

    var contactName = $('#contactNameId').val();
    var contactMobile = $('#contactMobileId').val();
    var contactEmail = $('#contactEmailId ').val();
    var contactMsg = $('#contactMsgId').val();

    sendContact(contactName, contactMobile, contactEmail, contactMsg);
});

// Contact send
function sendContact(contact_name, contact_mobile, contact_email, contact_msg) {
    axios.post('/ContactSend', {

            contact_name: contact_name,
            contact_mobile: contact_mobile,
            contact_email: contact_email,
            contact_msg: contact_msg
        })
        .then(function(response) {
            alert(response.data);
        })
        .catch(function(error) {

        })

}
