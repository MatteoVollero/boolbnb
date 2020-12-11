$(document).ready(function() {
    if (($(".input").val() == "UI")) {
        // modal messages bg 
        var modalMessagesBg = document.querySelector('.modal_messages_bg');
        // button messages modal
        var modalMessagesBtn = document.querySelector('.modal_messages_button');
        // close modal messages button
        var closeMessages = document.querySelector('.close_messages_modal');

        // make a messages button event click function to add the class active
        modalMessagesBtn.addEventListener('click', function() {
            BFixed = $("body").addClass("modal-open");
            modalMessagesBg.classList.add('bg_active');
        });

        // make an event click function to remove the class active
        closeMessages.addEventListener('click', function() {
            BFixed = $("body").removeClass("modal-open");
            modalMessagesBg.classList.remove('bg_active'); 
        });

        // send message
        var sendMessage = document.querySelector('.send_message');

        //make a click event to send the messages using the form
        sendMessage.addEventListener('click', function() {
            $('.nickname_input').val("");
            $('.email_input').val("");
            $('.message_input').val("");
            BFixed = $("body").removeClass("modal-open");
            modalMessagesBg.classList.remove('bg_active'); 
            $('.toast_message').addClass('toast_active');
        });

    }
});