document.addEventListener("DOMContentLoaded", function () {
  const humburgerMenu = document.getElementById("add");
  const closeResponsive = document.getElementById("close");
  const navigation = document.getElementById("navigation");
  humburgerMenu.addEventListener("click", function () {
    navigation.classList.remove("top-[-100%]");
    navigation.classList.add("top-[8%]");
    humburgerMenu.classList.add("hidden");
    humburgerMenu.classList.remove("md:hidden");
    closeResponsive.classList.remove("hidden");
    closeResponsive.classList.add("md:hidden");
  });
  closeResponsive.addEventListener("click", function () {
    navigation.classList.remove("top-[8%]");
    navigation.classList.add("top-[-100%]");
    closeResponsive.classList.remove("md:hidden");
    closeResponsive.classList.add("hidden");
    humburgerMenu.classList.remove("hidden");
    humburgerMenu.classList.add("md:hidden");
  });
});
