/* js pour pattern background div fadeIn***********************************/
document.addEventListener("DOMContentLoaded", () => {
  let blockMediaText = document.querySelectorAll(".wp-block-media-text");
  const fadeIn = (element) => {
    gsap.from(element, {
      opacity: 0,
      x: 200,
      duration: 1.5,
      delay: 0.5,
    });
  };
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        blockMediaText.forEach((element) => {
          fadeIn(element);
        });
      }
    });
  });

  const elements = document.querySelectorAll(".background");
  elements.forEach((element) => {
    observer.observe(element);
  });
});
/* js pour pattern s  witch img***********************************/
const imgSwitch = document.querySelectorAll(".switch img");
console.log(imgSwitch);
let currentImg = document.querySelector(".vide img");
console.log(currentImg);
currentImg.src = imgSwitch[0].src;
let count = 0;
setInterval(function () {
  if (count == 0) {
    count++;
    console.log("première envoi count =" + count);
    currentImg.src = imgSwitch[0].src;
  } else {
    count--;
    console.log("deuxieme envoi count =" + count);
    currentImg.src = imgSwitch[1].src;
  }
}, 2000);
