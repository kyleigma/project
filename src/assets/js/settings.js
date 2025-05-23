(function($) {
  'use strict';
  $(function() {
    $(".nav-settings").on("click", function() {
      $("#right-sidebar").toggleClass("open");
    });
    $(".settings-close").on("click", function() {
      $("#right-sidebar,#theme-settings").removeClass("open");
    });

    $("#settings-trigger").on("click" , function(){
      $("#theme-settings").toggleClass("open");
    });


    //background constants
    var navbar_classes = "navbar-danger navbar-success navbar-warning navbar-dark navbar-light navbar-primary navbar-info navbar-pink";
    var sidebar_classes = "sidebar-light sidebar-dark";
    var $body = $("body");

    //sidebar backgrounds
    $("#sidebar-light-theme").on("click" , function(){
      $body.removeClass(sidebar_classes);
      $body.addClass("sidebar-light");
      $(".sidebar-bg-options").removeClass("selected");
      $(this).addClass("selected");
    });
    $("#sidebar-dark-theme").on("click" , function(){
      $body.removeClass(sidebar_classes);
      $body.addClass("sidebar-dark");
      $(".sidebar-bg-options").removeClass("selected");
      $(this).addClass("selected");
    });


    //Navbar Backgrounds
    $(".tiles.primary").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-primary");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.success").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-success");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.warning").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-warning");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.danger").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-danger");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.light").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-light");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.info").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-info");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.dark").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-dark");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.default").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.default").on("click" , function(){
      $(".navbar").removeClass(navbar_classes);
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });

    $(".color-theme.default").click(function(){
      $(".color-theme.default").attr({
        "href" : "https://www.bootstrapdash.com/demo/star-admin2-pro/template/demo/vertical-default-light/index.html",
        "title" : "Light"
      });
    });
    $(".color-theme.dark").click(function(){
      $(".color-theme.dark").attr({
        "href" : "https://www.bootstrapdash.com/demo/star-admin2-pro/template/demo/vertical-default-dark/index.html",
        "title" : "Dark"
      });
    });
    $(".color-theme.brown").click(function(){
      $(".color-theme.brown").attr({
        "href" : "https://www.bootstrapdash.com/demo/star-admin2-pro/template/demo/vertical-default-brown/index.html",
        "title" : "Brown"
      });
    });
  });
})(jQuery);

window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.navbar');
  const sidebar = document.querySelector('.sidebar');
  const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
  const navbarLinksContainer = document.getElementById('navbar-sidebar-links');
  
  if (window.scrollY > 100) {
      navbar.classList.add('scrolled');
      sidebar.classList.add('scrolled');
      
      // Copy sidebar links to navbar
      if (navbarLinksContainer.innerHTML === '') {
          sidebarLinks.forEach(link => {
              const clonedLink = link.cloneNode(true);
              clonedLink.classList.add('nav-item');
              navbarLinksContainer.appendChild(clonedLink);
          });
      }
  } else {
      navbar.classList.remove('scrolled');
      sidebar.classList.remove('scrolled');
      navbarLinksContainer.innerHTML = '';
  }
});
