document.getElementById('importButton').addEventListener('click', function() {
    document.getElementById('inputImage').click();
  });
  
  document.getElementById('inputImage').addEventListener('change', function(event) {
    let input = event.target;
    let imgPreview = document.getElementById('imagePreview');
  
    let file = input.files[0];
    let reader = new FileReader();
  
    reader.onload = function(e) {
      imgPreview.src = e.target.result;
      imgPreview.style.display = 'block';
    };
  
    reader.readAsDataURL(file);
  });
  
  
  document.getElementById("importButton").addEventListener("click", function(event){
    event.preventDefault(); 
  });