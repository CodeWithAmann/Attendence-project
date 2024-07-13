document.addEventListener("DOMContentLoaded", function () {
    const cameraFeed = document.getElementById("cameraFeed");
    const captureBtn = document.getElementById("captureBtn");
    const photoPreview = document.getElementById("photoPreview");
    const entryForm = document.getElementById("entryForm");
    const submitBtn = document.getElementById("submitbtn"); // Corrected ID

    // Access the camera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            cameraFeed.srcObject = stream;
        })
        .catch(function (error) {
            console.error("Error accessing camera: ", error);
        });

    // Capture photo
    captureBtn.addEventListener("click", function () {
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");

        // Set canvas dimensions to match the camera feed
        canvas.width = cameraFeed.videoWidth;
        canvas.height = cameraFeed.videoHeight;

        // Draw the current frame from the camera onto the canvas
        context.drawImage(cameraFeed, 0, 0, canvas.width, canvas.height);

        // Display the captured photo in the preview
        photoPreview.src = canvas.toDataURL("image/png");
        photoPreview.style.display = "block";

        // Hide the video element
        cameraFeed.style.display = "none";

        // Enable the submit button
        submitBtn.removeAttribute("disabled");
    });

    // Form submission (you can customize this part based on your needs)
    entryForm.addEventListener("submit", function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Add the image data to the form data
        const formData = new FormData(entryForm);
        const imageData = photoPreview.src;
        formData.append("imageData", imageData);

        // Send the form data to the server using a POST request
        fetch("upload.php", {
            method: "POST",
            body: formData,
        })
        .then(function (response) {
            return response.text();
        })
        .then(function (result) {
            console.log("Server response: " + result);
            window.location.href = "http://localhost/aman4/submitalertbutton/index.php";
            // You can handle the response as needed, e.g., show a success message
        })
        .catch(function (error) {
            console.error("Error uploading photo and submitting form: ", error);
        });
    });
});
