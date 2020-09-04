const body = document.body;
const triggerMenu = document.querySelector(".trigger-menu");

var toggled = false;

$(document).ready(function () {
  $(".trigger-menu").click(function () {
    toggled = !toggled

    if(toggled) {
      $('body').addClass('overflow-hidden')
    } else {
      $('body').removeClass('overflow-hidden')
    }

    $(".menu-open .page-header .menu").fadeToggle();
    
    triggerMenu.classList.toggle("menu-button-animation");

  });
});

const nav = document.querySelector(".page-header nav");
const menu = document.querySelector(".page-header .menu");
const scrollUp = "scroll-up";
const scrollDown = "scroll-down";
let lastScroll = 0;

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll == 0) {
    body.classList.remove(scrollUp);
    return;
  }

  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollUp);
    body.classList.add(scrollDown);
  } else if (
    currentScroll < lastScroll &&
    body.classList.contains(scrollDown)
  ) {
    // up
    body.classList.remove(scrollDown);
    body.classList.add(scrollUp);
  }
  lastScroll = currentScroll;
});
