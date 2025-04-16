// Toggle Category Menu
document.addEventListener('DOMContentLoaded', function () {
  const categoryBtn = document.getElementById('categoryBtn');
  const categoryMenu = document.getElementById('categoryMenu');

  categoryBtn.addEventListener('click', function () {
    categoryMenu.classList.toggle('hidden');
  });

  // Optional: Hide dropdown if clicking outside of it
  document.addEventListener('click', function (e) {
    if (!categoryBtn.contains(e.target) && !categoryMenu.contains(e.target)) {
      categoryMenu.classList.add('hidden');
    }
  });
});
  
 // Get the profile button and the menu
const profileBtn = document.getElementById('profileBtn');
const profileMenu = document.getElementById('profileMenu');

// Add event listener for the button click
profileBtn.addEventListener('click', function() {
  // Toggle the 'hidden' class to show or hide the menu
  profileMenu.classList.toggle('hidden');
});

// Optional: Close the menu if clicking outside of it
document.addEventListener('click', function(event) {
  if (!profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
    profileMenu.classList.add('hidden');
  }
});
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