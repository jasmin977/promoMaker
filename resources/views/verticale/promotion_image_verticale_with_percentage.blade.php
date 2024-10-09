<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=210mm, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #fff;
            width: 210mm;
            height: 297mm;
            padding: 10px;
            margin: 0 auto;
            position: relative;
        }


        .title {
            font-size: 60px;
            color: #333;
            font-weight: 700;
        }

        .mark {
            font-size: 50px;
            color: #333;
            font-weight: 500;
            line-height: 0%;
        }

        .qte {
            font-size: 40px;
            color: #333;
            font-weight: 200;
            line-height: 0%;
        }

        .promotion {
            font-size: 90px;
            font-weight: 900;
            color: #e74c3c;
            line-height: 0%;
        }

        .decimal_price {
            font-size: 390px;
            color: #e74c3c;
            font-weight: 700;
            line-height: 0%;
            letter-spacing: -1cm;
        }

        .fractional_price {
            font-size: 180px;
            color: #e74c3c;
            font-weight: 700;
            letter-spacing: -3mm;
        }

        .dt {
            font-size: 70px;
            color: #e74c3c;
            font-weight: 900;
        }

        .decimal_old_price {
            font-size: 160px;
            color: #1f1f1f;
            font-weight: 700;
            line-height: 0%;
        }

        .fractional_old_price {
            font-size: 70px;
            color: #1f1f1f;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        .old_dt {
            font-size: 35px;
            color: #1f1f1f;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        .old-price {
            font-size: 20px;
            color: #e74c3c;
            text-decoration: line-through;
        }

        .discount {
            font-size: 80px;
            color: #ffffff;
            font-weight: 700;
            line-height: 0%;
            padding-left: 2mm;
            padding-right: 2mm
        }

        .bonneaffaire {
            font-size: 50px;
            color: #e74c3c;
            font-weight: 700;
            position: absolute;
            bottom: 5mm;
            left: 65mm;
        }

        .discount_percentage {
            font-size: 50px;
            color: #ffffff;
        }

        .lot_box {
            font-size: 50px;
            color: #e74c3c;
            line-height: 0%;
        }

        .data-table {
            right: 10%;
            top: 110mm;
            border-collapse: collapse;
            position: absolute;
        }

        .discount-table {
            background-color: #e74c3c;
            border-radius: 100%;
            text-align: center;
            padding: 10px;
            position: absolute;
            top: 40mm;
            right: 15mm;
            border: 8px solid white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            transform: rotate(10deg);
        }

        .left-section {
            width: 50%;
            text-align: left;
            padding-left: 60px;
        }

        .right-section {
            text-align: right;
        }

        .dt-label {
            margin: 0;
            padding: 0;
            padding-left: 30px;
        }

        .fractional-label {
            margin: 0;
            padding: 0;
            padding-left: 20px;
        }

        .old-price-line {
            position: absolute;
            background-color: #e74c3c;
            width: 9cm;
            height: 5px;
            left: 100mm;
            top: 45mm;

        }
    </style>
</head>

<body>

    <h1 class="promotion">PROMOTION</h1>

    <table class="discount-table">
        <tr>
            <td>
                <p class="discount">{{$percentage}}</p>
            </td>
            <td>
                <p class="discount_percentage">%</p>
            </td>
        </tr>
    </table>

    <table style="width: 100%; position: absolute; top: 70mm">
        <tr>
            <td class="left-section">
                {{-- <h1 class=" lot_box"> {{ $lots }}</h1> --}}
                <h1 class="title">{{ $product_name }}</h1>
                <h3 class="mark">{{ $product_mark }}</h3>
                <h5 class="qte">{{ $product_qte }}</h5>
                {{-- <h1 class=" lot_box"> {{ $free }}</h1> --}}
            </td>
            <td>
                <table>
                    <tr>
                        <td class="right-section">
                            <p class="decimal_old_price">{{ $decimal_old_price }}</p>
                            <div class="old-price-line"></div>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td style="vertical-align: bottom; display: table-cell; text-align: left">
                                        <p class="old_dt">DT</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; display: table-cell;">
                                        <p class="fractional_old_price">,{{ $fractional_old_price }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="data-table">
        <tr>
            <td class="right-section">
                <p class="decimal_price">{{ $decimal_price }}</p>
            </td>
            <td>
                <table>
                    <tr>
                        <td style="vertical-align: bottom; display: table-cell; text-align: left">
                            <p class="dt dt-label">DT</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; display: table-cell;">
                            <p class="fractional_price fractional-label">,{{ $fractional_price }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <h1 class="bonneaffaire">
        <span style="color:#71A821">B</span>onne <span style="color:#71A821">A</span>ffaire
    </h1>

</body>

</html>