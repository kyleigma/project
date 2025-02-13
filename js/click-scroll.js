//jquery-click-scroll
//by syamsul'isul' Arifin

var sectionArray = [1, 2, 3, 4, 5, 6, 7];

$.each(sectionArray, function(index, value){
          
     $(document).scroll(function(){
         var offsetSection = $('#' + 'section_' + value).offset().top - 84;
         var docScroll = $(document).scrollTop();
         var docScroll1 = docScroll + 1;
         
        
         if ( docScroll1 >= offsetSection ){
             $('.navbar-nav .nav-item .nav-link').removeClass('active');
             $('.navbar-nav .nav-item .nav-link:link').addClass('inactive');  
             $('.navbar-nav .nav-item .nav-link').eq(index).addClass('active');
             $('.navbar-nav .nav-item .nav-link').eq(index).removeClass('inactive');
         }
         
     });
    
    $('.click-scroll').eq(index).click(function(e){
        var offsetClick = $('#' + 'section_' + value).offset().top - 84;
        e.preventDefault();
        $('html, body').animate({
            'scrollTop':offsetClick
        }, 300)
    });
    
});
document.addEventListener("DOMContentLoaded", function () {
    const tabContainer = document.querySelector(".tab-carousel");
    const scrollLeftBtn = document.querySelector(".tab-scroll-left");
    const scrollRightBtn = document.querySelector(".tab-scroll-right");
    const dots = document.querySelectorAll(".carousel-dot");

    const tabWidth = tabContainer.querySelector('.nav-link').offsetWidth; // Get the width of each tab
    const totalTabs = tabContainer.querySelectorAll('.nav-link').length; // Total number of tabs

    // Update active dot based on scroll position
    function updateDots() {
        const scrollPosition = tabContainer.scrollLeft;
        const activeIndex = Math.round(scrollPosition / tabWidth);
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === activeIndex);
        });
    }

    // Scroll left
    scrollLeftBtn.addEventListener("click", () => {
        tabContainer.scrollBy({ left: -tabWidth, behavior: "smooth" });
    });

    // Scroll right
    scrollRightBtn.addEventListener("click", () => {
        tabContainer.scrollBy({ left: tabWidth, behavior: "smooth" });
    });

    // Scroll to the specific tab when clicking on a dot
    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            tabContainer.scrollTo({ left: tabWidth * index, behavior: "smooth" });
        });
    });

    // Listen for scroll events and update dots
    tabContainer.addEventListener("scroll", updateDots);

    // Initialize the dots state
    updateDots();
});

