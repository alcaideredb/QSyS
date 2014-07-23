Dropzone.options.uploadDrop = {
  maxFiles: 1,
  autoProcessQueue: false,
  addRemoveLinks: true,
  accept: function(file, done) {
    console.log("uploaded");
    done();
  },
  init: function() {
    this.on("maxfilesexceeded", function(file){
        alert("No more files please!");
    });
    var submitButton = document.querySelector("#submit-all");
    uploadDrop = this;
    submitButton.addEventListener("click",function(){
      uploadDrop.processQueue();
    });
    
  }
};