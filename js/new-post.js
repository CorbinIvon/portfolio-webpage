// Data Preview Handler.
const previewButton = document.getElementById("preview-button");
const editPreviewButton = document.getElementById("edit-preview-button");
const textareaHandler = document.getElementById("textarea-handler");
const previewMarkdownArea = document.getElementById("markdown-preview");
const previewMarkdownData = document.getElementById("preview-markdown-data");
previewButton.addEventListener("click", () => {
    previewButton.style.display = "none";
    editPreviewButton.style.display = "block";

    textareaHandler.style.display = "none";
    previewMarkdownArea.style.display = "block";
    
    previewMarkdownData.innerHTML = textareaHandler.value;
});
  editPreviewButton.addEventListener("click", () => {
    previewButton.style.display = "block";
    editPreviewButton.style.display = "none";

    textareaHandler.style.display = "block";
    previewMarkdownArea.style.display = "none";
});
// textarea handler
const textarea = document.getElementById("textarea-handler");
textarea.addEventListener("input", () => {
    textarea.style.height = "auto";
    textarea.style.height = `${textarea.scrollHeight}px`;
});
