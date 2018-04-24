// RAND TEXT...
function nextMsg() {
    if (messages.length == 0) {
        $('#testResult').fadeIn(2500);
        $('.circle-loader').toggleClass('load-complete');
        $('.checkmark').toggle();
        setInterval(function(){
            $('.loaderText').fadeOut();
        $('.circle-loader').fadeOut();
        }, 1000)
    } else {
        //console.log(messages);
        // change content of message, fade in, wait, fade out and continue with next message
        $('.loaderText').html(messages.pop()).fadeIn(500).delay(1000).fadeOut(500, nextMsg);
    }
};
// list of messages to display
var messages = [
    "Hello!",
    "This is a website!",
    "You are now going to be redirected.",
    "Are you ready?",
    "You're now being redirected..."
].reverse();