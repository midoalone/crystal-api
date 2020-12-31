<!doctype html>
<html lang="ar" dir="rtl">
<link href="{{storage_path('fonts/stylesheet.css')}}" rel="stylesheet" type="text/css">
<head>
  <meta charset="UTF-8">
  <title>عرض اسعار</title>

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
      <strong class="large">عرض اسعار</strong>
    </td>
  </tr>
</table>

<div style="height: 30px;"></div>

<table width="100%" class="bordered">
  <tr>
    <td colspan="2"><strong>اسم العميل:</strong> {{$order->user->name}} {{$order->user->last_name}}</td>
  </tr>
  <tr>
    <td><strong>التاريخ:</strong> {{\Carbon\Carbon::parse($order->date)->format('d-m-Y')}}</td>
    <td><strong>وقت التسليم:</strong> {{$order->from}}</td>
  </tr>
  <tr>
    <td><strong>عدد الضيوف:</strong> {{$order->attendees_number}}</td>
    <td><strong>نوع الضيوف:</strong> {{$types[$order->attendees_type]}}</td>
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
    <td align="right" class="gray">{{$order->total}} SR</td>
  </tr>
  </tfoot>
</table>

<br/>

<table width="100%" class="break">
  <tr>
    <td>
      <strong class="large">الشروط و الاحكام</strong>
    </td>
  </tr>
  <tr>
    <td>
      <ol>
        <li>للحجز يجب دفع 50% من قيمة المبلغ الكامل.</li>
        <li>يتم دفع القيمة المتبقية في نفس يوم المناسبة عند تجهيز الفرش .</li>
        <li>لا يتم استرداد المبلغ في حال إلغاء المناسبة قبل 24 ساعة من تنفيذ الطلب .</li>
        <li>يعتبر هذا العقد بمثابة عقد ملزم للطرفين بكل ما أشتمل عليه من بنود وتفاصيل ولا يجوز إلغاء هذا العقد من
          قبل الطرف الثاني الا قبل 3 أيام من وقت المناسبة , وفي حال تم إلغاء الطلب بعد هذه المدة يتم الخصم كما ذكر في
          العقد اعلاه .
        </li>
        <li>هذا السند واجب الدفع بدون تعلل بموجب قرار مجلس الوزراء الموقر 692 تاريخ 26/ 9/ 1383هـ والمتوج بالمرسوم
          الملكي الكريم رقم 37 تاريخ 11/ 10 / 1383هـ نظام الاوراق التجارية.
        </li>
      </ol>
    </td>
  </tr>
</table>

</body>
</html>
