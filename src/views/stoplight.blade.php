<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $name }}</title>
  <!-- Embed elements Elements via Web Component -->
  <script src="{{ route('serve-stoplight.asset', ['asset' => 'web-components.min', 'ext' => 'js'], false) }}"></script>
  <link rel="stylesheet" href="{{ route('serve-stoplight.asset', ['asset' => 'styles.min', 'ext' => 'css'], false) }}">
</head>
<body>

<elements-api
        apiDescriptionUrl="{{ route('serve-stoplight.yaml', ['version1' => $version, 'version2' => $version], false) }}"
        router="{{ config('serve-stoplight.config.router') }}"
        layout="{{ config('serve-stoplight.config.layout') }}"
/>

</body>
</html>
