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

// jQuery to observe the closing and opening of the menu

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    $("header").css("display", "flex");
    // $("header").css("opacity", "1");
    $("header").css("flex-direction", "column");
  } else {

    $("header").css("display", "none");
    // $("header").css("opacity", "0");
  }
  prevScrollpos = currentScrollPos;
};


// col-12 smooth apearing

document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1 
  });

  document.querySelectorAll('.col-12').forEach(element => {
    observer.observe(element);
  });
});

