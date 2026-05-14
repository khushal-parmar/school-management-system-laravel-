<html>
<head>
    <title>Receipt_{{ $pr->ref_no.'_'.$sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/receipt.css') }}"/>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; margin: 0; padding: 20px; background-color: #f5f5f5; }
        .container { background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1); max-width: 850px; margin: auto; position: relative; overflow: hidden; }
        
        /* Watermark Logo */
        .watermark { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.05; z-index: 0; width: 400px; }

        /* Header Section */
        .header-table { width: 100%; border-bottom: 2px solid #1b0c80; padding-bottom: 20px; margin-bottom: 20px; position: relative; z-index: 1; }
        .school-name { color: #1b0c80; font-size: 28px; font-weight: bold; text-transform: uppercase; }
        .school-address { font-size: 14px; font-style: italic; color: #555; }
        .receipt-title { font-size: 24px; font-weight: bold; color: #000; margin-top: 10px; display: block; letter-spacing: 2px; }

        /* Reference Box */
        .ref-box { float: right; text-align: center; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; min-width: 180px; }
        .ref-title { background: #f0f7ff; padding: 8px; font-size: 12px; color: #1b0c80; font-weight: bold; border-bottom: 1px solid #ddd; }
        .ref-no { background: #fff; padding: 10px; font-size: 20px; font-weight: bold; color: #d32f2f; }

        /* Info Sections */
        .section-header { background: #1b0c80; color: #fff; padding: 8px 15px; font-size: 16px; font-weight: bold; border-radius: 4px; margin: 20px 0 15px 0; clear: both; }
        
        .student-photo { width: 90px; height: 90px; border: 3px solid #f0f0f0; border-radius: 8px; float: left; object-fit: cover; }
        .info-table { float: left; margin-left: 20px; border-collapse: collapse; }
        .info-table td { padding: 5px 10px; font-size: 15px; }
        .bold { font-weight: bold; color: #555; width: 100px; }

        /* Payment Table */
        .payment-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .payment-table th { background: #f8fafc; border-bottom: 2px solid #ddd; padding: 12px; text-align: left; font-size: 14px; color: #1b0c80; }
        .payment-table td { padding: 12px; border-bottom: 1px solid #eee; font-size: 14px; }
        
        /* Total Box */
        .total-box { float: right; margin-top: 20px; text-align: right; width: 250px; }
        .total-row { padding: 15px; border-radius: 8px; background: #fff9c4; border: 1px solid #fbc02d; text-align: center; }
        .status-paid { color: #2e7d32; font-weight: bold; font-size: 22px; }
        .status-due { color: #c62828; font-weight: bold; font-size: 22px; }

        .clear { clear: both; }
        @media print {
            body { background: none; padding: 0; }
            .container { box-shadow: none; border: none; max-width: 100%; }
            button { display: none; }
        }
    </style>
</head>
<body>

<div class="container">
    {{-- Background Watermark --}}
    <img src="{{ $s['logo'] }}" class="watermark" alt="Logo">

    <div id="print-area">
        {{-- Header --}}
        <table class="header-table">
            <tr>
                <td>
                    <span class="school-name">{{ strtoupper(Qs::getSetting('system_name')) }}</span><br/>
                    <span class="school-address">{{ ucwords($s['address']) }}</span><br/>
                    <span class="receipt-title">OFFICIAL PAYMENT RECEIPT</span>
                </td>
                <td style="vertical-align: top;">
                    <div class="ref-box">
                        <div class="ref-title">RECEIPT REFERENCE</div>
                        <div class="ref-no">{{ $pr->ref_no }}</div>
                    </div>
                </td>
            </tr>
        </table>

        {{-- Student Information --}}
        <div class="section-header text-uppercase">Student Details</div>
        <div style="margin-bottom: 20px;">
            <img class="student-photo shadow" src="{{ $sr->user->photo }}" alt="Student">
            <table class="info-table">
                <tr>
                    <td class="bold">NAME:</td>
                    <td style="text-transform: uppercase; font-weight: bold;">{{ $sr->user->name }}</td>
                </tr>
                <tr>
                    <td class="bold">ADM NO:</td>
                    <td>{{ $sr->adm_no }}</td>
                </tr>
                <tr>
                    <td class="bold">CLASS:</td>
                    <td>{{ $sr->my_class->name }}</td>
                </tr>
            </table>
            <div class="clear"></div>
        </div>

        {{-- Payment Summary --}}
        <div class="section-header">Payment Summary</div>
        <table class="payment-table">
            <tr>
                <td class="bold">PAYMENT FOR:</td>
                <td>{{ $payment->title }}</td>
                <td class="bold">DATE:</td>
                <td>{{ date('d-M-Y') }}</td>
            </tr>
            <tr>
                <td class="bold">DESCRIPTION:</td>
                <td colspan="3">{{ $payment->description ?: 'N/A' }}</td>
            </tr>
        </table>

        {{-- Payment History / Transaction Details --}}
        <div class="section-header">Transaction Records</div>
        <table class="payment-table">
            <thead>
                <tr>
                    <th>Date Paid</th>
                    <th>Payment Reference</th>
                    <th>Amount Paid (₹)</th>
                    <th>Balance Due (₹)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($receipts as $r)
                    <tr>
                        <td>{{ date('jS F, Y', strtotime($r->created_at)) }}</td>
                        <td>{{ $pr->ref_no }}</td>
                        <td style="font-weight: bold;">{{ number_format($r->amt_paid, 2) }}</td>
                        <td style="color: #d32f2f;">{{ number_format($r->balance, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Final Total and Status --}}
        <div class="total-box">
            <div style="font-size: 14px; font-weight: bold; margin-bottom: 5px; color: #666;">
                {{ $pr->paid ? 'PAYMENT STATUS' : 'OUTSTANDING BALANCE' }}
            </div>
            <div class="total-row shadow-sm">
                <span class="{{ $pr->paid ? 'status-paid' : 'status-due' }}">
                    @if($pr->paid)
                        <i class="icon-checkmark-circle"></i> FULLY CLEARED
                    @else
                        ₹ {{ number_format($pr->balance, 2) }}
                    @endif
                </span>
            </div>
        </div>

        <div class="clear"></div>

        {{-- Footer --}}
        <div style="margin-top: 50px; text-align: center; font-size: 12px; color: #888; border-top: 1px solid #eee; padding-top: 10px;">
            This is a computer-generated receipt. No signature is required. <br>
            <strong>Thank you for your payment!</strong>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        window.print();
    }
</script>
</body>
</html>