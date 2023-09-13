// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

let topbar = document.querySelector('.topbar');

window.addEventListener("scroll", function() {
  if (window.pageYOffset >= 10) {
   topbar.classList.add("active");
    // Your code logic here
  }else {
    topbar.classList.remove("active");
  }
});

