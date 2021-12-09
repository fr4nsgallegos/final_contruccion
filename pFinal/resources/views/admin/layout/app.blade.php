<head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
            <script src="{{ asset('js/agenda.js') }}" defer></script>

            <script type="text/javascript">
                var baseURL={!! json_encode(url('/')) !!}
            </script>
</head>