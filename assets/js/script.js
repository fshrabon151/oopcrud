// Load user photo
userPhoto.onchange = (evt) => {
  const [file] = userPhoto.files;
  if (file) {
    imagePreview.src = URL.createObjectURL(file);
  }
};


