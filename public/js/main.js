$(function () {
    function log(message) {
       $("#response").text(message);
       $('pre span').each(function (i, block) {
           hljs.highlightBlock(block);
       });
   }
    $("#sendSms").click(() => {
       let to = $("#phone").val();
       if ( !to) {
           log(JSON.stringify({ error: "Enter a phone number" }, null, 2));
           return;
       }
        log("Sending SMS...");
        $.ajax({
           method: "POST",
           url: "/sms/send",
           data: {
               to,
               message: "Im a lumberjack, I sleep all day and I code all night"
           },
       })
       .done(function (msg) {
           console.log("message : ", msg);
           log(JSON.stringify(msg, null, 2));
       })
       .fail(function (jqXHR, textStatus) {
           console.log("jqXHR", jqXHR);
           log(textStatus);
       });
    });
    $("#airtime").click(function () {
       const to = $("#phone").val();
       const inputAmount = $("#amount").val();
       if (!to) {
           log(JSON.stringify({ error: "Enter a phone number" }, null, 2));
           return;
       }
        if (!inputAmount) {
           log(JSON.stringify({ error: "Enter an amount (with currency) e,g, ₦ 50" }, null, 2));
           return;
       }
        let currencyCode, amount;
       [currencyCode, amount] = inputAmount.split(" ");
        log("Sending airtime.....");
        $.ajax({
           method: "POST",
           url: "/airtime/send",
           data: {
               to,
               currencyCode,
               amount
           }
       })
       .done(function (msg) {
           log(JSON.stringify(msg, null, 2));
       })
       .fail(function (jqXHR, textStatus) {
           log(textStatus);
       });
    });
    $("#mobileCheckout").click(function () {
       const phoneNumber = $("#phone").val();
       const inputAmount = $("#mobileCheckoutAmount").val();
       const productName = "TestProduct";
        if (!phoneNumber) {
           log(JSON.stringify({ error: "Enter a phone number" }, null, 2));
           return;
       }
        if (!inputAmount) {
           log(JSON.stringify({ error: "Enter an amount (with currency) e,g, ₦ 50" }, null, 2));
           return;
       }
        let currencyCode, amount;
       [currencyCode, amount] = inputAmount.split(" ");
        log("Sending...");
        $.ajax({
           method: "POST",
           url: "/payments/mobile-checkout",
           data: {
               phoneNumber,
               currencyCode,
               amount,
               productName
           }
       })
       .done(function (msg) {
           log(JSON.stringify(msg, null, 2));
       })
       .fail(function (jqXHR, textStatus) {
           log(textStatus);
       });
    });
    $("#mobileB2C").click(function () {
       const phoneNumber = $("#phone").val();
       const inputAmount = $("#mobileB2CAmount").val();
       if (!phoneNumber) {
           log(JSON.stringify({ error: "Enter a phone number" }, null, 2));
           return;
       }
        if (!inputAmount) {
           log(JSON.stringify({ error: "Enter an amount (with currency) e,g, ₦ 50" }, null, 2));
           return;
       }
        let currencyCode, amount;
       [currencyCode, amount] = inputAmount.split(" ");
        log("Sending money...");
        $.ajax({
           method: "POST",
           url: "/payments/mobile-b2c",
           data: {
               phoneNumber,
               currencyCode,
               amount
           }
       })
       .done(function (msg) {
           log(JSON.stringify(msg, null, 2));
       })
       .fail(function (jqXHR, textStatus) {
           log(textStatus);
       });
    });
});

$(document).ready(function(){
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it ta₦ to scroll to the specified area
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
    });

    // check if scroll event happened
    $(window).scroll(function() {
        // check if user scrolled more than 550 from top of the browser window
        if ($(document).scrollTop() > 550) {
            // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
            $(".navbar-fixed-top").css("background-color", "black");
        } else {
            $(".navbar-fixed-top").css("background-color", "transparent"); // if not, change it back to transparent
        }
    });
});
