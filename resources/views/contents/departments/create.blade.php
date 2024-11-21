<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Button to Open the Modal -->
    <button id="openModal" class="btn btn-primary">Add New Department</button>

    <!-- The Modal -->
    <div id="myModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" style="cursor:pointer;">&times;</span>
            <h2>Add New Department</h2>
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="dep_id">Department ID</label>
                    <input type="text" name="dep_id" id="dep_id" required>
                </div>
                <div class="form-group">
                    <label for="dep_name">Department Name</label>
                    <input type="text" name="dep_name" id="dep_name" required>
                </div>
                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" id="designation" required>
                </div>
                <div class="form-group">
                    <label for="no_of_employees">Number of Employees</label>
                    <input type="number" name="no_of_employees" id="no_of_employees" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Department</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>