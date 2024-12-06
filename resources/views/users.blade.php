<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .user-card {
            flex: 1 1 calc(50% - 15px);
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .user-card h5 {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .search-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5 bg-gray">
        

        <div class="search-container">
            <h5 class="mb-1">Search</h5>
            <input type="text" id="searchInput" class="form-control" placeholder="Search name/designation/department">
        </div>

        <div class="card-container bg-white" id="userCards">
            @foreach ($users as $user)
            <div class="user-card">
                <h5>{{ $user->name }}</h5>
                <p class="mb-1">{{ $user->designation->name }}</p>
                <p class="mb-1">{{ $user->department->name }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <script>
      $('#searchInput').on('keyup', function () {
    var value = $(this).val().toLowerCase();

    var cards = $('.user-card').filter(function () {
        return $(this).text().toLowerCase().includes(value);
    });

    cards.sort(function (a, b) {
        return $(a).text().toLowerCase().indexOf(value) - $(b).text().toLowerCase().indexOf(value);
    });

    $('.user-card').hide();
    $('#userCards').append(cards.show());
});


    </script>
</body>
</html>
