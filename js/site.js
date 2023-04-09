// New Code to fix #1
const edit_Button = document.getElementById("edit-button");
const preview_Button = document.getElementById("preview-button");
const textarea_PostArea = document.getElementById("textarea-post-area");
const preview_PostArea = document.getElementById("preview-post-area");
const submit_togglable = document.getElementById("login-togglable");

edit_Button.addEventListener("click", () => {
  if (submit_togglable != null)
    submit_togglable.style.display = "block";
  textarea_PostArea.value = preview_PostArea.innerHTML;

  preview_PostArea.style.display = "none";
  textarea_PostArea.style.display = "block";

  preview_Button.style.display = "block";
  edit_Button.style.display = "none";

  textarea_PostArea.style.height = "auto";
  textarea_PostArea.style.height = `${textarea_PostArea.scrollHeight}px`;
});
preview_Button.addEventListener("click", () => {
  if (submit_togglable != null)
    submit_togglable.style.display = "none";
  preview_PostArea.innerHTML = textarea_PostArea.value;

  preview_PostArea.style.display = "block";
  textarea_PostArea.style.display = "none";

  preview_Button.style.display = "none";
  edit_Button.style.display = "block";
});
textarea_PostArea.addEventListener("input", () => {
  textarea_PostArea.style.height = "auto";
  textarea_PostArea.style.height = `${textarea_PostArea.scrollHeight}px`;
});


const carousel_images = document.querySelectorAll('.carousel-image');
let currentIndex = 0;
if (carousel_images.length > 0){
  function showImage(index) {
    carousel_images[currentIndex].classList.remove('active');
    carousel_images[index].classList.add('active');
    currentIndex = index;
    // // get the carousel element and the images
    // const carousel = document.querySelector('.carousel');
    // const images = document.querySelectorAll('.carousel-image');

    // // calculate the aspect ratio of the first image
    // const aspectRatio = images[index].naturalWidth / images[index].naturalHeight;

    // // set the height of the carousel based on the aspect ratio
    // carousel.style.height = `${carousel.offsetWidth / aspectRatio}px`;
  }
  document.querySelector('.carousel-arrow.previous').addEventListener('click', () => {
    const index = currentIndex === 0 ? carousel_images.length - 1 : currentIndex - 1;
    showImage(index);
  });
  document.querySelector('.carousel-arrow.next').addEventListener('click', () => {
    const index = currentIndex === carousel_images.length - 1 ? 0 : currentIndex + 1;
    showImage(index);
  });
  showImage(0);
}
