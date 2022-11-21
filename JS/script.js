var pages = document.querySelectorAll(".page");
// document.getElementById("nextBtn").addEventListener("onclick", () => {
//   changePageNext();
// });
function changePageNext() {
  let currentClass;
  for (let i = 0; i < pages.length; i++) {
    if (pages[i].classList.contains("show")) {
      currentClass = i;
      break;
    }
  }
  document.getElementById("submitBtn").classList.remove("show");
  document.getElementById("submitBtn").classList.add("hide");
  pages[currentClass].classList.remove("show");
  pages[currentClass].classList.add("hide");
  //   console.log(currentClass);
  pages[currentClass + 1].classList.add("show");
  pages[currentClass + 1].classList.remove("hide");
  if (currentClass + 1 > 0) {
    document.getElementById("preButton").removeAttribute("disabled");
  }
  if (currentClass < 3) {
    document.getElementById("nextButton").removeAttribute("disabled");
  }
  if (currentClass + 1 == 3) {
    document.getElementById("nextButton").setAttribute("disabled", "disabled");
    document.getElementById("submitBtn").classList.add("show");
  }
}

function changePagePre() {
  let currentClass;
  for (let i = 0; i < pages.length; i++) {
    if (pages[i].classList.contains("show")) {
      currentClass = i;
      break;
    }
  }
  document.getElementById("submitBtn").classList.remove("show");
  document.getElementById("submitBtn").classList.add("hide");
  pages[currentClass].classList.remove("show");
  pages[currentClass].classList.add("hide");
  console.log(currentClass);
  pages[currentClass - 1].classList.add("show");
  pages[currentClass - 1].classList.remove("hide");

  if (currentClass > 0) {
    document.getElementById("preButton").removeAttribute("disabled");
  }
  if (currentClass - 1 == 0) {
    document.getElementById("preButton").setAttribute("disabled", "disabled");
  }
  if (currentClass - 1 < 3) {
    document.getElementById("nextButton").removeAttribute("disabled");
  }
}
