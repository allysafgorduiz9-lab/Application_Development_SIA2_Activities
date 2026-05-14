<!DOCTYPE html>
<html>
<head>
    <title>PD1 SK Event List</title>
    <style>
        /* BODY AND HEADER */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8fafc;
            margin: 0;
        }

        header {
            background: #334155;
            color: white;
            padding: 25px 40px; /* more top/bottom padding */
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        header h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: 1px;
        }

        main { padding: 40px 30px; } /* more space around main */

        .container { max-width: 1100px; margin: auto; }

        h2 { margin-bottom: 30px; color: #1e293b; }

        /* GRID LAYOUT */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px; /* more space between cards */
        }

        /* CARD DESIGN */
        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 5px solid #94a3b8;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        /* IMAGE */
        .card img {
            width: 100%;
            height: 200px; /* slightly taller for better spacing */
            object-fit: cover;
            margin-bottom: 20px; /* more space below image */
        }

        /* CARD CONTENT */
        .card-content {
            padding: 30px 35px; /* generous padding inside card */
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .card-content h3 {
            margin: 15px 0 10px 0; /* more spacing for title */
            font-size: 20px;
        }

        .card-content p {
            margin: 8px 0; /* more spacing between text lines */
            font-size: 14px;
            color: #64748b;
        }

        .date, .venue {
            font-size: 13px;
            color: #64748b;
        }

        a { text-decoration: none; color: #1e293b; }

        /* BUTTON */
        .btn {
            padding: 12px 18px; /* bigger button */
            background: #475569;
            color: white;
            border-radius: 10px;
            font-size: 14px;
            text-align: center;
            display: inline-block;
            margin-top: auto; /* push button to bottom */
            transition: 0.2s;
        }

        .btn:hover { background: #334155; }

        /* BADGES */
        .badge {
            padding: 5px 12px; /* bigger badge for clarity */
            font-size: 13px;
            border-radius: 18px;
            display: inline-block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .sports { background: #dcfce7; color: #166534; }
        .cultural { background: #fef9c3; color: #854d0e; }
        .educational { background: #e0f2fe; color: #075985; }
        .esports { background: #f3e8ff; color: #6b21a8; }
        .assembly { background: #fee2e2; color: #991b1b; }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #94a3b8;
            margin-top: 40px;
        }

    </style>
</head>
<body>

<header>
    <h1>PD1 SK Event List</h1>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>© 2026 PD1 SK Events</footer>

</body>
</html>