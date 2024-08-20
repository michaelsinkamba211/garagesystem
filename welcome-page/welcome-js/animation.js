// Animation for boxes

const boxes = document.querySelectorAll(".box");
window.addEventListener("scroll", checkBoxesBoxes);
checkBoxesBoxes();

function checkBoxesBoxes() {
  const triggerBottom = (window.innerHeight / 5) * 4;

  boxes.forEach((box) => {
    const boxTop = box.getBoundingClientRect().top;

    if (boxTop < triggerBottom) {
      box.classList.add("animate");
      console.log(window.innerHeight);
    } else {
      box.classList.remove("animate");
    }
  });
}


// col-12 smooth apearing





// spinner

// JavaScript to hide the spinner
document.addEventListener("DOMContentLoaded", function() {
  // Ensure the spinner is hidden after everything is loaded
  window.addEventListener("load", function() {
    document.getElementById("spinner").style.display = "none";
  });
});





// for auto hiding
let lastScrollTop = 0;
let scrolledPastPoint = false;
const scrollThreshold = 60; // Adjust this value to determine when the header behavior starts

window.addEventListener("scroll", function () {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Scroll down
        if (scrolledPastPoint) {
            document.querySelector('.header').style.transform = 'translateY(-100%)';
        }
    } else {
        // Scroll up
        if (scrolledPastPoint) {
            document.querySelector('.header').style.transform = 'translateY(0)';
        }
    }

    if (currentScroll > scrollThreshold) {
        scrolledPastPoint = true;
    } else {
        scrolledPastPoint = false;
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
}, false);



// smooth apearing of the products_holder



document.addEventListener('DOMContentLoaded', function () {
  // Function to observe elements and add 'visible' class
  function observeElements(selector) {
      const elements = document.querySelectorAll(selector);
      const observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  entry.target.classList.add('visible');
              }
          });
      }, { threshold: 0.2 });

      elements.forEach(element => {
          observer.observe(element);
      });
  }

  // Observing different types of elements
  observeElements('.product_holder');
});
