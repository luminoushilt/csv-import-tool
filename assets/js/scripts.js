document.addEventListener('DOMContentLoaded', function() {

  const importButton = document.querySelector('.import-button');

  importButton.addEventListener('click', checkFormValue);

  function checkFormValue(action) {
    let fileUpload = document.querySelector('#file-upload').value;
    let fileExt = fileUpload.split('.').pop();

    if (!(fileUpload === '' || fileUpload === undefined)) {
      if (fileExt === 'csv' || fileExt === 'xls' || fileExt === 'xlsx') {
        let successMessage = document.querySelector('#file-upload-error');
        successMessage.innerHTML = 'Importing File Now...';
      } else {
        let errorMessage = document.querySelector('#file-upload-error');
        errorMessage.innerHTML = 'Please choose a CSV File.';
        action.preventDefault();
      }
    } else {
      let errorMessage = document.querySelector('#file-upload-error');
      errorMessage.innerHTML = 'Please choose a file.';
      action.preventDefault();
    }
  }

 });