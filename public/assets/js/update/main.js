 //Sticky NaV

 $(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.nav-scl').addClass('active');
        } else {
            $('.nav-scl').removeClass('active');
        }
    });
});





// FAQ


var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}









// mainSlider 


		$('.slider-active').slick({
			dots: true,
			infinite: true,
			autoplay: true,
			speed: 700,
			fade: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover:false,
			responsive: [
			  {
				breakpoint: 1024,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  infinite: true,
				  dots: true
				}
			  },
			  {
				breakpoint: 600,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 480,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1
				}
			  }
			]
		  });



		  $('.test-slider-active').slick({
			dots: false,
			infinite: true,
			autoplay: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			
			centerMode: false,
			focusOnSelect: false,
			responsive: [
			  {
				breakpoint: 1024,
				settings: {
				  slidesToShow: 3,
				  slidesToScroll: 1,
				  infinite: true,
				  autoplay: true,
				  dots: false
				}
			  },
			  {
				breakpoint: 991,
				settings: {
				  slidesToShow: 1,
				  autoplay: true,
				  slidesToScroll: 1,
				  dots: false
				}
			  },
			  {
				breakpoint: 480,
				settings: {
				  slidesToShow: 1,
				  autoplay: true,
				  slidesToScroll: 1,
				  dots: false
				}
			  }
			  // You can unslick at a given breakpoint now by adding:
			  // settings: "unslick"
			  // instead of a settings object
			]
		  });



		  

		  $('.mob-carosel-1').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: true,
			autoplay: true,
			speed: 300,
			mobileFirst: true,
			dots: true,
			responsive: [
				  {
						  breakpoint: 767,
						  settings: 'unslick'
				  }
			]
		  });


		  $('.mob-carosel').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: true,
			autoplay: true,
			speed: 300,
			mobileFirst: true,
			dots: true,
			responsive: [
				  {
						  breakpoint: 767,
						  settings: 'unslick'
				  }
			]
		  });




// filter items on button click
$('.portfolio-menu').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});

//for menu active class
$('.portfolio-menu button').on('click', function(event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});




grecaptcha.ready(function () {
    if (grecaptcha.getResponse() === "") {
        alert("Please validate the Google reCaptcha.");
    } else {
        alert("Successful validation! Now you can submit this form to your server side processing.");
    }
});


$(document).ready(function(){
	$(".read").click(function(){
		$(this).prev().toggle();
		$(this).siblings('.dots').toggle();
		if($(this).text()=='Read more'){
			$(this).text('Read less');
		}
		else{
			$(this).text('Read more');
		}
	});
});


$(document).on('click', 'nav ul li', function(){
	$(this).addClass('moz-active').siblings().removeClass('moz-active')
})


function myFunction() {
  document.getElementById("tomyDropdown").classList.toggle("toshow");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("tomyInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("tomyDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}


