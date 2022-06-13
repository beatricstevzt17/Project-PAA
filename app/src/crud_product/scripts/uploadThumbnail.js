const uploadThumbnail = {
    onupload: (e) => {
        let reader = new FileReader();
        reader.onloadend = () => {
            document.getElementById("thumbnail").style.backgroundImage = "url('" + reader.result + "')";
            document.getElementById("thumbnail").style.backgroundPosition = "center";
            document.getElementById("thumbnail").style.backgroundSize = "200px";
            document.getElementById("thumbnail").style.width = "200px";
            document.getElementById("thumbnail").style.height = "200px";
            document.querySelector("i.bi.bi-images.text-8xl").remove();
        }
        reader.readAsDataURL(e.target.files[0]);
    },
    init: () => {
        document.getElementById("upload").onchange = uploadThumbnail.onupload;
    },
}

uploadThumbnail.init();