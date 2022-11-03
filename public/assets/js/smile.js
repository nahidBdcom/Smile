

$(function(){
    $("#solution_request_form").on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $('span.guest_name_error').text('');
                $('span.guest_phone_error').text('');
                $('span.guest_email_error').text('');
                $('span.guest_req_type_error').text('');

                $('p.customizedSolutionSuccessHead').text('');
                $('p.customizedSolutionSuccessMessage').text('');
        },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix,val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('#solution_request_form')[0].reset();
                    $('p.customizedSolutionSuccessHead').text(' Sent successfully!');
                    $('p.customizedSolutionSuccessHead').prepend('<img src="http://smilewww.mybdcom.com/assets/images/success_logo.png" alt="success">');
                    $('p.customizedSolutionSuccessMessage').text('Our team will contact you very soon.');
                }

            }
        });
    });
});


$(function(){
    $("#contact_us_form").on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $('span.info_name_error').text('');
                $('span.info_phone_error').text('');
                $('span.info_email_error').text('');
                $('p.getInformationSuccessHead').text('');
                $('p.getInformationSuccessMessage').text('');
        },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix,val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('#contact_us_form')[0].reset();
                    $('p.getInformationSuccessHead').text(' Sent successfully!');
                    $('p.getInformationSuccessHead').prepend('<img src="http://smilewww.mybdcom.com/assets/images/success_logo.png" alt="success">');
                    $('p.getInformationSuccessMessage').text('Our team will contact you very soon.');
                }

            }
        });
    });
});

function funcSeoShowHide(e) {
    console.log(e.innerHTML);
    e.classList.toggle("btn-seo-read-more");
    e.classList.toggle("btn-seo-read-less");
    var x = document.getElementById("seoMoreContentBlock");
    x.classList.toggle("d-none");
    x.classList.toggle("d-block");
  }

let items = document.querySelectorAll('.carousel .carousel-item.smile-package')

items.forEach((el) => {
    const minPerSlide = 3
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
        	next = items[0]
      	}
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
});



const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $(".dropdown").hover(
      function() {
        $(this).children("a.dropdown-toggle").addClass(showClass);
        $(this).children("a.dropdown-toggle").attr("aria-expanded", "true");
        $(this).children("ul.dropdown-menu").addClass(showClass);
	$(this).children("ul.dropdown-menu").attr("data-bs-popper","none");
      },
      function() {
        $(this).children("a.dropdown-toggle").removeClass(showClass);
        $(this).children("a.dropdown-toggle").attr("aria-expanded", "false");
        $(this).children("ul.dropdown-menu").removeClass(showClass);
	$(this).children("ul.dropdown-menu").removeAttr("data-bs-popper");
      }
    );
  } else {
    //$(dropdown).off("mouseenter mouseleave");
  }
});



/*
$(document).ready(function(){
    $(".dropdown > a.nav-link.dropdown-toggle").hover(function(){
	    console.log("Menu hover");
        //var dropdownMenu = $(this).children(".dropdown-menu");
	//dropdownMenu.addClass("show");
        //if(dropdownMenu.is(":visible")){
        //    dropdownMenu.parent().toggleClass("open");
        //}
	if($(this).click()){
	    console.log("I am Clicked!!!");
	}
    });
});

*/
