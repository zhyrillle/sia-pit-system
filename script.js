//Category Menu
document.addEventListener('DOMContentLoaded', function () {
  const categoryBtn = document.getElementById('categoryBtn');
  const categoryMenu = document.getElementById('categoryMenu');

  categoryBtn.addEventListener('click', function () {
    categoryMenu.classList.toggle('hidden');
  });
  document.addEventListener('click', function (e) {
    if (!categoryBtn.contains(e.target) && !categoryMenu.contains(e.target)) {
      categoryMenu.classList.add('hidden');
    }
  });
});
  
 // profile button and drop down menu
const profileBtn = document.getElementById('profileBtn');
const profileMenu = document.getElementById('profileMenu');
profileBtn.addEventListener('click', function() {
  profileMenu.classList.toggle('hidden');
});
document.addEventListener('click', function(event) {
  if (!profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
    profileMenu.classList.add('hidden');
  }
});

//katong rating stars
const stars = document.querySelectorAll('#starRating span');
const ratingInput = document.getElementById('ratingValue');
let selectedRating = 0;

stars.forEach((star, index) => {
  star.addEventListener('mouseover', () => updateStars(index + 1));
  star.addEventListener('click', () => {
    selectedRating = index + 1;
    ratingInput.value = selectedRating;
  });
  star.addEventListener('mouseleave', () => updateStars(selectedRating));
});

function updateStars(rating) {
  stars.forEach((star, i) => {
    star.textContent = i < rating ? '★' : '☆';
    star.classList.toggle('text-yellow-400', i < rating);
  });
}
