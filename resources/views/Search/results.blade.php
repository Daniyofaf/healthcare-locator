@extends('search.searchpage')

@section('content')
    <div class="search-results">
        @if(count($results) > 0)
            @foreach($results as $result)
                <div class="search-result">
                    <!-- Display your search result content here -->
                    <h2>{{ $result->h_name }}{{ $result->c_name }}{{ $result->sc_name }}{{ $result->sh_name }}</h2>
                    <p><strong>Address:</strong> {{ $result->Region }}, {{ $result->Zone }}, {{ $result->Wereda }}</p>
                    <p><strong>Service:</strong>
                        @foreach ($result->Service as $service)
                            {{ $service }},
                        @endforeach
                    </p>

                    <!-- Add your map display code here -->
                    <div id="map{{ $loop->index + 1 }}" style="width: 50%; height: 300px;"></div>
                    <script>
                        // Retrieve latitude and longitude values from your PHP variables
                        var latitude{{ $loop->index }} = {{ $result->Latitude }};
                        var longitude{{ $loop->index }} = {{ $result->Longitude }};

                        // Initialize the map
                        var map{{ $loop->index }} = L.map('map{{ $loop->index + 1 }}').setView([latitude{{ $loop->index }}, longitude{{ $loop->index }}], 15);

                        // Add a tile layer (OpenStreetMap)
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map{{ $loop->index }});

                        // Add a marker to the map
                        L.marker([latitude{{ $loop->index }}, longitude{{ $loop->index }}]).addTo(map{{ $loop->index }});
                    </script>
                </div>
            @endforeach
        @else
            <p class="no-results-message">No results found.</p>
        @endif
    </div>
@endsection
