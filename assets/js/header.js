function hss_close_menu(node) {
    node.parentNode.classList.remove("collapsed");
  }
  
  function hss_open_menu(e) {
    var menu = e.nextElementSibling;
    menu.classList.add("collapsed");
  }
  
  jQuery(document).ready(function () {
    if (window.innerWidth < 992) {
      jQuery(document).on("click", function () {
        var nodes = document.querySelectorAll(".hss-main-menu .sub-menu-display");
        nodes.forEach(function (item) {
          item.classList.remove("sub-menu-display");
        });
      });
  
      document
        .querySelector(".hss-main-menu")
        .addEventListener("click", function (event) {
          event.stopPropagation();
        });
      jQuery(".hss-main-menu .navbar-nav li.menu-item-has-children > a").on(
        "click",
        function (e) {
          e.preventDefault();
          var node = this.nextElementSibling;
          if (node.className == "sub-menu") {
            node.classList.add("sub-menu-display");
          } else {
            node.classList.remove("sub-menu-display");
          }
        }
      );
    }
  });