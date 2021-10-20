<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['student']['name'] }} - Details</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #efefef;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <div>
                    <img src="backend/images/logo-dark.png" alt="">
                </div>
            </td>
            <td>
                <h2>Magnus ERP</h2>
                <p>School address</p>
                <p>Phone : 987655678</p>
                <p>Email: support@magnus.com</p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student Details</th>
                <th scope="col">Student Data</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Student Name</td>
                <td>{{ $details['student']['name'] }}</td>
            </tr>
            <tr>
                <td scope="row">2</td>
                <td>Student ID no</td>
                <td>{{ $details['student']['id_no'] }}</td>
            </tr>
            <tr>
                <td scope="row">3</td>
                <td>Student role</td>
                <td>{{ $details['student']['role'] }}</td>
            </tr>
            <tr>
                <td scope="row">4</td>
                <td>Father's name</td>
                <td>{{ $details['student']['father'] }}</td>
            </tr>
            <tr>
                <td scope="row">5</td>
                <td>Mother's name</td>
                <td>{{ $details['student']['mother'] }}</td>
            </tr>
            <tr>
                <td scope="row">6</td>
                <td>Mobile</td>
                <td>{{ $details['student']['mobile'] }}</td>
            </tr>
            <tr>
                <td scope="row">7</td>
                <td>Address</td>
                <td>{{ $details['student']['address'] }}</td>
            </tr>
            <tr>
                <td scope="row">8</td>
                <td>Gender</td>
                <td>{{ $details['student']['gender'] }}</td>
            </tr>
            <tr>
                <td scope="row">9</td>
                <td>Date of birth</td>
                <td>{{ $details['student']['birthday'] }}</td>
            </tr>
            <tr>
                <td scope="row">10</td>
                <td>Religion</td>
                <td>{{ $details['student']['religion'] }}</td>
            </tr>
            <tr>
                <td scope="row">11</td>
                <td>Year</td>
                <td>{{ $details['year']['name'] }}</td>
            </tr>
            <tr>
                <td scope="row">12</td>
                <td>Group</td>
                <td>{{ $details['group']['name'] }}</td>
            </tr>
            <tr>
                <td scope="row">13</td>
                <td>Shift</td>
                <td>{{ $details['shift']['name'] }}</td>
            </tr>
            <tr>
                <td scope="row">14</td>
                <td>Discount</td>
                <td>{{ $details['discount']['discount'] }} %</td>
            </tr>

        </tbody>
    </table>
    <i>Print date: {{ date("d M Y") }}</i>
</body>
</html>
