<!DOCTYPE html>
<html>
<head>
    <title>Salary Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Link to your CSS file -->
    <style>
        /* Add any custom styles here */
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('images/hrms_logo/hrms_black.png') }}" style="width:100%; max-width:130px;border-radius:100px;">
                            </td>
                            <td>
                                Invoice #: {{ $salary->id }}<br>
                                Paid Date: {{ \Carbon\Carbon::parse($salary->salary_paid_date)->format('d-m-Y') }}<br>
                                Created: {{ \Carbon\Carbon::parse($salary->created_at)->format('d-m-Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Employee Name</b><br>
                                <b>Department</b><br>
                                <b>Job Designation</b>
                            </td>
                            <td>
                                {{ $salary->employee_name }}<br>
                                {{ $salary->department }}<br>
                                {{ $salary->designation }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Item</td>
                <td>Amount</td>
            </tr>
            <tr class="item">
                <td>Basic Salary</td>
                <td>{{ $salary->basic_salary }}</td>
            </tr>
            @php
            $allowances = json_decode($salary->allowances, true);
            @endphp
            @foreach ($allowances as $allowance)
            <tr class="item">
                <td>{{ $allowance['name'] }}</td>
                <td>{{ $allowance['amount'] }}</td>
            </tr>
            @endforeach
            <tr class="item">
                <td>Total Allowances</td>
                <td>{{ $salary->total_allowances }}</td>
            </tr>
            @php
            $deductions = json_decode($salary->deductions, true);
            @endphp
            @foreach ($deductions as $deduction)
            <tr class="item">
                <td>{{ $deduction['name'] }}</td>
                <td>{{ $deduction['amount'] }}</td>
            </tr>
            @endforeach
            <tr class="item">
                <td>Total Deductions</td>
                <td>{{ $salary->total_deductions }}</td>
            </tr>
            <tr class="total">
                <td></td>
                <td>Net Salary: {{ $salary->net_salary }}</td>
            </tr>
        </table>
        <button onclick="window.print()" class="btn btn-success">Print</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
