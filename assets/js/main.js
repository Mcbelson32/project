// add hovered class to selected list item
import { dataArray } from "./data.js";

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
  document.getElementById("logo").classList.toggle("small");
  document.querySelector(".big").classList.toggle("hidden");
  main.classList.toggle("active");
};

let topbar = document.querySelector(".topbar");

window.addEventListener("scroll", function () {
  if (window.pageYOffset >= 10) {
    topbar.classList.add("active");
    // Your code logic here
  } else {
    topbar.classList.remove("active");
  }
});

console.log(dataArray);
var search = document.getElementById("search");
var table = document.querySelector(".search-table");
var tbody = document.getElementById("tbody");

search.addEventListener("keyup", () => {
  var val = search.value;
  console.log(val);
  if (val === "") {
    tbody.innerHTML = ``; // Reset the table to its original state
    return;
  }
  var data = searchTable(val, dataArray);
  console.log("data:" + data);
  buildTable(data);
});

search.addEventListener("blur", () => {
  table.style.height = "0px";
});
search.addEventListener("focus", () => {
  if (search.value != "") {
    table.style.height = "200px";
  }
});

function searchTable(value, data) {
  var filters = [];

  for (let i = 0; i < data.length; i++) {
    if (!isNaN(parseFloat(value))) {
      var id = data[i].id;

      if (id.includes(value)) {
        filters.push(data[i]);
      }
    } else {
      value = value.toLowerCase();
      var name = data[i].u_name.toLowerCase();
      if (name.includes(value)) {
        filters.push(data[i]);
      }
    }
  }

  return filters;
}

function buildTable(data) {
  tbody.innerHTML = ``;
  for (let i = 0; i < data.length; i++) {
    table.style.height = "200px";

    var row = `<tr>
                  <td>${data[i].id}</td>
                  <td>${data[i].u_name}</td>
                  <td>${data[i].f_name}</td>
                  <td>${data[i].g_name}</td>
                </tr>`;
    tbody.innerHTML += row;
  }
}
