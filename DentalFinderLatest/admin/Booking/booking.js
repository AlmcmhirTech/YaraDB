const sideBar = document.querySelector(".toggle-btn");

sideBar.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

