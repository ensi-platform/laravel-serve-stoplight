<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $name }}</title>
  <!-- Embed elements Elements via Web Component -->
  <script src="{{ route('serve-stoplight.asset', ['asset' => 'web-components.min', 'ext' => 'js'], config('serve-stoplight.config.absolute_url_for_asset', false)) }}"></script>
  <link rel="stylesheet" href="{{ route('serve-stoplight.asset', ['asset' => 'styles.min', 'ext' => 'css'], config('serve-stoplight.config.absolute_url_for_asset', false)) }}">
</head>
<body>

<elements-api
        apiDescriptionUrl="{{ $url }}"
        router="{{ config('serve-stoplight.config.router') }}"
        layout="{{ config('serve-stoplight.config.layout') }}"
/>

</body>
</html>
