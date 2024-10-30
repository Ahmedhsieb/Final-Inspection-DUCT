<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signature Capture</title>
    <script src="{{asset('Assets/Design/js/signature_pad.umd.min.js')}}"></script>
    <style>
        #signature-pad {
            border: 1px solid #000;
            width: 100%;
            max-width: 500px;
            height: 200px;
        }
    </style>
</head>
<body>
<h2>Signature Form</h2>
<form action="/submit-signature" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Signature Pad Canvas -->
    <canvas id="signature-pad"></canvas>

    <!-- Hidden Input to Hold Base64 Signature Data -->
    <input type="hidden" name="signature" id="signature-input">

    <!-- Buttons to Control Signature Pad -->
    <button type="button" onclick="clearSignature()">Clear</button>
    <button type="submit" onclick="saveSignature()">Submit</button>
</form>

<script>
    // Initialize Signature Pad
    const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas);

    // Function to clear the signature pad
    function clearSignature() {
        signaturePad.clear();
    }

    // Function to save the signature as a base64 string in the hidden input
    function saveSignature() {
        if (!signaturePad.isEmpty()) {
            const signatureData = signaturePad.toDataURL('image/png');
            document.getElementById('signature-input').value = signatureData;
        }
    }
</script>
</body>
</html>
