<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Financial Goals Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .goals-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .goals-table th,
        .goals-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .goals-table th {
            background-color: #f5f5f5;
        }
        .progress-bar {
            width: 100%;
            background-color: #f0f0f0;
            padding: 3px;
            border-radius: 3px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, .2);
        }
        .progress-bar-fill {
            display: block;
            height: 15px;
            background-color: #4CAF50;
            border-radius: 3px;
            transition: width 500ms ease-in-out;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Financial Goals Report</h1>
        <p>Generated on {{ now()->format('F j, Y') }}</p>
    </div>

    <table class="goals-table">
        <thead>
            <tr>
                <th>Goal</th>
                <th>Category</th>
                <th>Progress</th>
                <th>Current / Target</th>
                <th>Target Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goals as $goal)
            <tr>
                <td>
                    <strong>{{ $goal->name }}</strong>
                    <br>
                    <small>{{ $goal->description }}</small>
                </td>
                <td>{{ $goal->category->name }}</td>
                <td>
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: {{ $goal->progress['percentage'] }}%"></div>
                    </div>
                    {{ $goal->progress['percentage'] }}%
                </td>
                <td>€{{ number_format($goal->current_amount, 2) }} / €{{ number_format($goal->target_amount, 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($goal->target_date)->format('M j, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>SaveSmart - Your Financial Goals Partner</p>
    </div>
</body>
</html> 