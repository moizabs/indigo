$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false, // Disable navigation arrows
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 1
        },
        768: {
            items: 2
        },
        992: {
            items: 2
        },
        1200: {
            items: 3
        }
    }
});



// ================== Star Rating ================== 

const stars = document.querySelectorAll(".star");
const ratingContainer = document.querySelector(".star-rating");

stars.forEach((star, index) => {
  star.addEventListener("click", () => {
    const rating = index + 1;
    setRating(rating);
  });
});

function setRating(rating) {
  ratingContainer.dataset.rating = rating;
  stars.forEach((star, index) => {
    if (index < rating) {
      star.classList.add("checked");
    } else {
      star.classList.remove("checked");
    }
  });
}
