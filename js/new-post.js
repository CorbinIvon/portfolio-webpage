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