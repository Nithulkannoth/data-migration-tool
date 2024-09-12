<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Employees</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Employee Excel File</h2>
        <form id="uploadForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Excel File</label>
                <input type="file" id="file" name="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <div class="progress mt-3" style="height: 30px;">
            <div class="progress-bar progress-bar-striped" id="progressBar" role="progressbar" style="width: 0%"></div>
        </div>

        <div id="progressText" class="mt-2">Upload Progress: 0%</div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#uploadForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('employees.upload') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert('File uploaded successfully! Now processing the data...');
                    checkProgress();
                },
                error: function (response) {
                    alert('Error occurred during the upload.');
                }
            });
        });

        function checkProgress() {
            setInterval(function () {
                $.ajax({
                    url: '{{ route('employees.progress') }}',
                    type: 'GET',
                    success: function (data) {
                        $('#progressBar').css('width', data.progress + '%');
                        $('#progressText').text('Upload Progress: ' + data.progress + '%');
                    }
                });
            }, 2000); // Poll every 2 seconds
        }
    </script>
</body>
</html>
