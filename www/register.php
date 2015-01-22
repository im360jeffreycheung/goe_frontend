<!DOCTYPE html>
<html>
<head>
    <title>file.fileTransfer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function getTitle() {
			document.getElementById("ct").innerHTML = "DEMO: " + document.title;
		}
	</script>



    <script type="text/javascript" charset="utf-8" src="cordova.js"></script>
    <script type="text/javascript" charset="utf-8">

        // Wait for device API libraries to load
        //
        document.addEventListener("deviceready", onDeviceReady, false);

        // device APIs are available
        //
        function onDeviceReady() {
            // Retrieve image file location from specified source
            navigator.camera.getPicture(
                uploadPhoto,
                function(message) { alert('get picture failed'); },
                {
                    quality         : 50,
                    destinationType : navigator.camera.DestinationType.FILE_URI,
                    sourceType      : navigator.camera.PictureSourceType.PHOTOLIBRARY
                }
            );
        }

        function uploadPhoto(imageURI) {
            var options = new FileUploadOptions();
            options.fileKey="file";
            options.fileName=imageURI.substr(imageURI.lastIndexOf('/')+1);
            options.mimeType="image/jpeg";

            var params = {};
            params.value1 = "test";
            params.value2 = "param";

            options.params = params;

            var ft = new FileTransfer();
            ft.upload(imageURI, encodeURI("submit.php"), win, fail, options);
        }

        function win(r) {
            console.log("Code = " + r.responseCode);
            console.log("Response = " + r.response);
            console.log("Sent = " + r.bytesSent);
        }

        function fail(error) {
            alert("An error has occurred: Code = " + error.code);
            console.log("upload error source " + error.source);
            console.log("upload error target " + error.target);
        }

        </script>
</head>
<body onload="getTitle();">
	<ul id="nav">
		<li><a href="index.html">&larr; Back</a></li>
		<li><a href="#" id="ct" onclick="location.reload();"></a></li>
	</ul>
    <h1>Example</h1>
    <p>Upload File</p>
</body>
</html>
