document.addEventListener("DOMContentLoaded", () => {
  let uploadButton = document.getElementById("edit_upload");
  let choosenImage = document.getElementById("image-preview");

  uploadButton.onchange = () => {
    if (uploadButton.files.length > 0) {
      let reader = new FileReader();

      reader.readAsDataURL(uploadButton.files[0]);
      console.log(uploadButton.files[0]); // Log for debugging

      reader.onload = () => {
        choosenImage.setAttribute("src", reader.result);
      };

      reader.onerror = (error) => {
        console.error("Error reading image:", error);
      };
    } else {
      console.warn("No file selected.");
    }
  };
});
