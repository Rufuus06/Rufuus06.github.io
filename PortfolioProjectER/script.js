// Project Cards - Animation //
function expandCard(card) {
  card.style.transform = "scale(1.1)";
  card.style.zIndex = "1";
  card.style.transition = "transform 0.3s";
  card.querySelectorAll(".card-img-top")[0].style.filter = "grayscale(0%)";
}

function resetCards(card) {
  card.style.transform = "scale(1)";
  card.style.zIndex = "0";
  card.style.transition = "transform 0.3s";
  card.querySelectorAll(".card-img-top")[0].style.filter = "grayscale(100%)";
}


// Project Cards - Color change //
function changeToColor(image) {
  image.style.filter = "grayscale(0%)";
}

function changeToBW(image) {
  image.style.filter = "grayscale(100%)";
}


// Back Top Button
window.addEventListener('scroll', scrollFunction);

function scrollFunction() {
  var scrollToTopBtn = document.getElementById("scrollToTopBtn");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopBtn.classList.add("show");
  } else {
    scrollToTopBtn.classList.remove("show");
  }
}

function scrollToTop() {
  document.documentElement.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}


// Experience - Animation //
var lastScrollPosition = 0;

var lastScrollPosition = 0;
var windowHeight = window.innerHeight || document.documentElement.clientHeight;

var lastScrollPosition = 0;
var windowHeight = window.innerHeight || document.documentElement.clientHeight;

function isInViewport(element) {
  var rect = element.getBoundingClientRect();
  return rect.bottom <= windowHeight;
}

function animateTimeline() { 
  var line = document.querySelector('.line');
  var timelineItems = document.querySelectorAll('.timeline-item');
  var experienceTitle = document.querySelector('#experience-title');
  var currentScrollPosition = window.scrollY || window.pageYOffset;

  if (currentScrollPosition > lastScrollPosition) {
    // Scroll hacia abajo
    if (isInViewport(experienceTitle)) {
      experienceTitle.classList.add('animate');
    }

    if (isInViewport(line)) {
      var scrollPercentage = (currentScrollPosition / (document.documentElement.scrollHeight - windowHeight)) * 100;
      line.style.height = (scrollPercentage * 1.25) + '%';

      var delay = 0;
      var direction = 'left';

      timelineItems.forEach(function(item, index) {
        if (isInViewport(item)) {
          item.classList.add('animate');
          item.style.animationDelay = delay + 's';
          item.style.animationDirection = direction;

          delay += 0.2;
          direction = direction === 'left' ? 'right' : 'left';
        }
      });
    }
  } else {
    // Scroll hacia arriba
    var scrollPercentage = (currentScrollPosition / (document.documentElement.scrollHeight - windowHeight)) * 100;
    line.style.height = (scrollPercentage * 1.25) + '%';

    timelineItems.forEach(function(item, index) {
      if (!isInViewport(item)) {
        item.classList.remove('animate');
      }
    });
  }

  lastScrollPosition = currentScrollPosition;
}

window.addEventListener('scroll', animateTimeline);
window.addEventListener('resize', function() {
  windowHeight = window.innerHeight || document.documentElement.clientHeight;
  animateTimeline();
});
window.addEventListener('load', animateTimeline);
