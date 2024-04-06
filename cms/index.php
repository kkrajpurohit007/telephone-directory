<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Pagination and Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles for this template */
        body {
            padding-top: 5rem;
            padding-bottom: 3rem;
        }
        .jumbotron {
            background-color: #fff;
        }
        .jumbotron p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php include_once 'components/header.php'; ?>
    <main role="main" class="container pb-5">
        <div class="row">
            <div class="col-md-12">
            <h2 class="display-4">Telephone Directory</h2>
            <p class="lead">This example demonstrates a table with pagination and search functionality using Bootstrap.</p>
            </div>
        </div>
        <!-- Error Warning message show -->
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <strong>Heads up!</strong> This is a static example with dummy data. You can replace it with dynamic data from a database.
                </div>
            </div>
        </div>
        <?php include 'contact-table.php'; ?>
        <?php /*
        <!-- Search bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="searchButton"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table-responsive table-hover table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Table rows will be dynamically generated here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Pagination links will be dynamically generated here -->
            </ul>
        </nav>
        */ ?>
    </main>
    <?php include_once 'components/footer.php'; ?>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        // Dummy data for demonstration
        const data = [
            { id: 1, firstName: "John", lastName: "Doe", email: "john@example.com" },
            { id: 2, firstName: "Jane", lastName: "Doe", email: "jane@example.com" },
            { id: 3, firstName: "Bob", lastName: "Smith", email: "bob@example.com" },
            { id: 4, firstName: "Alice", lastName: "Johnson", email: "alice@example.com" },
            { id: 5, firstName: "Mike", lastName: "Brown", email: "mike@example.com" }
        ];

        // Function to populate table with data
        function populateTable(data) {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';
            data.forEach(item => {
                tbody.innerHTML += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.firstName}</td>
                        <td>${item.lastName}</td>
                        <td>${item.email}</td>
                    </tr>
                `;
            });
        }

        // Function to perform search
        function performSearch() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const filteredData = data.filter(item =>
                item.firstName.toLowerCase().includes(searchText) ||
                item.lastName.toLowerCase().includes(searchText) ||
                item.email.toLowerCase().includes(searchText)
            );
            populateTable(filteredData);
            // Reinitialize pagination
            initPagination(filteredData);
        }

        // Function to initialize pagination
        function initPagination(data) {
            const pageSize = 2; // Number of items per page
            const pageCount = Math.ceil(data.length / pageSize);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';
            for (let i = 1; i <= pageCount; i++) {
                pagination.innerHTML += `
                    <li class="page-item"><a class="page-link" href="#" onclick="changePage(${i})">${i}</a></li>
                `;
            }
        }

        // Function to change page
        function changePage(pageNumber) {
            const pageSize = 2; // Number of items per page
            const startIndex = (pageNumber - 1) * pageSize;
            const endIndex = startIndex + pageSize;
            const currentPageData = data.slice(startIndex, endIndex);
            populateTable(currentPageData);
        }

        // Initial population of table and pagination
        populateTable(data);
        initPagination(data);

        // Event listener for search button click
        document.getElementById('searchButton').addEventListener('click', performSearch);
    </script>
</body>
</html>
