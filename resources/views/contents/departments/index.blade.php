<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Add Department</h1>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="dep_name" class="form-label">Department Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <div class="mb-3">
                <label for="no_of_employees" class="form-label">Number of Employees</label>
                <input type="number" class="form-control" id="no_of_employees" name="no_of_employees" required min="0">
            </div>
            <button type="submit" class="btn btn-primary">Add Department</button>
        </form>
    </div>
</body>
</html>