<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flipkart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <a href="/login">
                <img src="{{ asset('/frontend/assets/fk-logo.png') }}" width="25%" alt="Flipkart" class="img-fluid" />
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <iframe src="https://flipkart.com?igu=1" title="Flipkart" class="w-100" style="height: 1000px;"></iframe>
        </div>
    </div>
</div>
</body>
</html>