<!DOCTYPE html>
<html>
<title>F9 Info Technologies Donate Invoice</title>

<head>
    <style type="text/css">
        body,
        p,
        li,
        td,
        th {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 400 !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700 !important;
        }

        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            padding: 0;
            margin-bottom: 15px
        }

        section {
            padding: 0;
            margin: 0;
        }

        body {
            font-size: 16px;
            color: #000000;
            line-height: 26px;
            margin: 0;
            padding: 0;
        }

        a {
            color: #0f6600;
            text-decoration: none;
        }

        a:hover {
            color: #b34a04;
        }

        header {
            text-align: center;
            border-bottom: solid 1px #958E8E;
            padding-bottom: 15px;
            margin-bottom: 30px
        }

        header .logo {
            max-width: 500px;
            margin: 0 auto 20px auto;
            display: block;
        }

        header .logo img {
            width: 100%;
        }

        .receipt {
            margin-bottom: 20px;
        }

        .receipt p {
            margin: 0;
            font-weight: 700 !important;

        }

        .font_bold {
            font-weight: 700 !important;
        }

        .tq_note {
            margin-top: 70px;
            font-style: italic;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            border-top: solid 1px #958E8E;
            padding: 20px 0;

        }
    </style>
</head>

<body>
    <header>
        <a class="logo" href="https://f9tech.com/" target="_blank"> <img
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/site-images/' . applicationSettings('logo')))) }}"
                alt="Chicago Andhra" /></a>
        <p>
            F9 Info Technologies<br>
            P.O.Box: 2431, 2855 Forest Creek Ln, Naperville IL 60567<br>
            United States of America
        </p>
        <p>ACKNOWLEDGEMENT OF PAYMENT</p>
    </header>
    <section>
        <div class="receipt">
            <p>Receipt No: {{ $donation->id }}</p>
            <p>Date: {{ date('d-m-Y') }}</p>
        </div>
        <div class="content">
            <p>Received with thanks from {{ $donation->first_name . ' ' . $donation->last_name }}
                ({{ $donation->email }}), a donation of {{ formatAmount($donation->donation_amount) }} i.e, through
                <a href="https://f9tech.com/" target="_blank">https://f9tech.com/</a> towards
                {{ $donation->donation_category_id != null ? ($donation->donationCategory->donation_cause == 'Other' ? $donation->donation_cause_other : $donation->donationCategory->donation_cause) : '' }}
            </p>
            <p><span class="font_bold">Details of your donation:</span><br>
                Payment mode -
                {{ $donation->transaction != '' ? $donation->transaction->paymentMethod->payment_method_name : '' }}<br>
                Date of donation - {{ formatDate($donation->created_at) }}<br>
                Phone number - {{ $donation->phone_no }}</p>
            <p>Thank you so much for your support and contribution!</p>

        </div>

        <div class="tq_note"> This document is only an acknowledgement of your payment.<br>
            For any further queries about your contribution, please write to <a
                href="mailto:treasurer@f9tech.com" target="_blank">treasurer@f9tech.com</a></div>

    </section>
    <footer><a href="https://f9tech.com/" target="_blank">https://f9tech.com/</a> |
        <a href="mailto:projects@f9tech.com" target="_blank">projects@f9tech.com</a>
    </footer>
</body>

</html>
