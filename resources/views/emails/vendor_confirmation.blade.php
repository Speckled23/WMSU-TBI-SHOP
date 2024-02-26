<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif;">

<table>
    <tr>
        <td><strong>Seller Name is {{$name}},</strong></td>
    </tr>
    <tr>
        <td>&nbsp;<br></td>
    </tr>
    <tr>
        <td>Please click on the link below to confirm seller account:</td>
    </tr>
    <tr>
        <td><a href="{{ url('vendor/confirm/'.$code) }}">{{ url('vendor/confirm/'.$code) }}</a></td>
    </tr>
    <tr>
        <td>&nbsp;<br></td>
    </tr>
    <tr>
        <td>Attached are the images:</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>Government ID:</strong></td>
                </tr>
                <tr>
                    <td><img src="{{ $govID }}" alt="Government ID"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>Permit ID:</strong></td>
                </tr>
                <tr>
                    <td><img src="{{ $permitID }}" alt="Permit ID"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>BIR ID:</strong></td>
                </tr>
                <tr>
                    <td><img src="{{ $birID}}" alt="BIR ID"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>DTI ID:</strong></td>
                </tr>
                <tr>
                    <td><img src="{{ $dtiID }}" alt="DTI ID"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;<br></td>
    </tr>
    <tr>
        <td><em>Thanks & Regards,</em></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>WMSU Technology Business Incubator</strong></td>
    </tr>
</table>


</body>
</html>
