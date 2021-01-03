<!doctype html>
<html lang="ar" dir="rtl">
<link href="{{storage_path('fonts/stylesheet.css')}}" rel="stylesheet" type="text/css">
<head>
  <meta charset="UTF-8">
  <title>فاتورة مبيعات</title>

  <style type="text/css">
    body {
      font-family: Dubai W23, sans-serif;
    }

    ul{
      margin: 0;
    }

    .large {
      font-size: 22px;
    }

    .underline{
      text-decoration: underline;
    }

    .medium {
      font-size: 18px;
      font-weight: 500;
    }

    thead th {
      font-weight: 500;
      font-size: 18px;
    }

    .gray {
      background-color: lightgray
    }

    table.bordered {
      border-collapse: collapse;
    }

    table.bordered td, table.bordered th {
      border: 1px solid #999;
      padding: 0.5rem;
    }

    .break{
      page-break-before: auto;
      page-break-inside: avoid;
    }
  </style>

</head>
<body>

<table width="100%">
  <tr>
    <td valign="top" align="center"><img src="{{asset('storage/logo_wide.png')}}" alt="" height="100"/></td>
  </tr>
  <tr>
    <td valign="top" align="center">
      <strong class="large">فاتورة مبيعات</strong>
    </td>
  </tr>
</table>

<div style="height: 30px;"></div>

<table width="100%" class="bordered">
  <tr>
    <td><strong>اسم العميل:</strong> {{$order->user->name}} {{$order->user->last_name}}</td>
    <td><strong>فاتورة رقم:</strong> {{$order->id}}</td>
  </tr>
  <tr>
    <td><strong>التاريخ:</strong> {{\Carbon\Carbon::parse($order->date)->format('d-m-Y')}}</td>
    <td><strong>وقت التسليم:</strong> {{$order->from}}</td>
  </tr>
  <tr>
    <td><strong>عدد الضيوف:</strong> {{$order->attendees_number}}</td>
    <td><strong>نوع الضيوف:</strong> {{$types[$order->attendees_type]}}</td>
  </tr>
  <tr>
    <td><strong>رقم و اسم للعميل:</strong> {{$order->user->id}} - {{$order->user->name}} {{$order->user->last_name}}</td>
    <td><strong>الرقم الضريبي للعميل:</strong> ......</td>
  </tr>
  <tr>
    <td><strong>ممثل المبيعات:</strong> {{$order->salesman ? $order->salesman->name : "...."}}</td>
    <td><strong>VAT NO : 300127561800003</strong></td>
  </tr>
</table>

<br/>

<table width="100%" class="bordered">
  <thead style="background-color: lightgray;">
  <tr>
    <th>Items</th>
    <th>Description</th>
    <th style="direction: ltr">Amount (SR)</th>
  </tr>
  </thead>
  <tbody>
  @foreach($groups as $group)
    <tr>
      <td>
        <strong class="medium">{{$group['category']['name_ar']}} {{$group['category']['name_en']}}</strong>

        <ul>
          @foreach($group['products'] as $product)
            <li>{{$product['name_ar']}}</li>
          @endforeach
        </ul>
      </td>
      <td align="right">
        {{$group['category']['description_ar']}} <br /> {{$group['category']['description_en']}}
      </td>
      <td align="right">{{$group['price']}} SR</td>
    </tr>
  @endforeach
  </tbody>

  <tfoot class="medium">
  <tr>
    <td></td>
    <td align="left">Total</td>
    <td align="right">{{$order->subtotal}} SR</td>
  </tr>
  <tr>
    <td></td>
    <td align="left">Vat 15%</td>
    <td align="right">{{$order->vat}} SR</td>
  </tr>
  <tr>
    <td></td>
    <td align="left">Net With Vat</td>
    <td align="right">{{$order->total}} SR</td>
  </tr>
  <tr>
    <td></td>
    <td align="left">المدفوع</td>
    <td align="right">{{$order->paid}} SR</td>
  </tr>
  <tr>
    <td></td>
    <td align="left">المتبقي</td>
    <td align="right" class="gray">{{$order->due}} SR</td>
  </tr>
  </tfoot>
</table>

<br/>

<table width="100%" class="break">
  <tr>
    <td align="center">
      <strong class="large underline">Client Signature</strong>
    </td>
    <td align="center">
      <strong class="large underline">Sales Signature</strong>
    </td>
  </tr>
</table>

</body>
</html>
