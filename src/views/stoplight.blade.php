<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $name }}</title>
  <!-- Embed elements Elements via Web Component -->
  <script src="https://unpkg.com/@stoplight/elements@v7/web-components.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/@stoplight/elements@v7/styles.min.css">
</head>
<body>

<elements-api
        apiDescriptionUrl="{{ $url }}"
        router="{{ config('serve-stoplight.config.router') }}"
        layout="{{ config('serve-stoplight.config.layout') }}"
/>

</body>
</html>
